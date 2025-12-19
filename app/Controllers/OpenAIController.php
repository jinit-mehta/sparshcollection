<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class OpenAIImageController extends Controller
{
    private $apiKey;
    
    public function __construct()
    {
        // Load API key from environment variable or config
        $this->apiKey = getenv('OPENAI_API_KEY') ?: config('OpenAI')->apiKey;
        
        if (empty($this->apiKey)) {
            throw new \RuntimeException('OpenAI API key not configured');
        }
    }

    // =========== Generate Image
    public function generateImage()
    {
        try {
            $prompt = $this->request->getVar('prompt');
            
            if (empty($prompt)) {
                return $this->response->setJSON([
                    'error' => 'Prompt is required'
                ])->setStatusCode(400);
            }

            // Prepare the API request
            $requestData = [
                "prompt" => $prompt,
                "n" => 1,
                "size" => "256x256",
                "response_format" => "b64_json"
            ];

            // Call OpenAI API
            $response = $this->callOpenAIImageGeneration($requestData);

            if (isset($response['error'])) {
                return $this->response->setJSON([
                    'error' => $response['error']['message'] ?? 'Unknown error'
                ])->setStatusCode(500);
            }

            return $this->response->setJSON($response)->setStatusCode(200);

        } catch (\Exception $e) {
            log_message('error', 'Image generation error: ' . $e->getMessage());
            return $this->response->setJSON([
                'error' => 'Failed to generate image'
            ])->setStatusCode(500);
        }
    }

    // =========== Edit Image
    public function editImage()
    {
        try {
            // Validate file uploads
            if (!isset($_FILES['image']) || !isset($_FILES['mask'])) {
                return $this->response->setJSON([
                    'error' => 'Image and mask files are required'
                ])->setStatusCode(400);
            }

            $image = $_FILES['image'];
            $mask = $_FILES['mask'];
            $prompt = $this->request->getVar('prompt');

            if (empty($prompt)) {
                return $this->response->setJSON([
                    'error' => 'Prompt is required'
                ])->setStatusCode(400);
            }

            // Validate file uploads
            if ($image['error'] !== UPLOAD_ERR_OK || $mask['error'] !== UPLOAD_ERR_OK) {
                return $this->response->setJSON([
                    'error' => 'File upload failed'
                ])->setStatusCode(400);
            }

            // Validate file types (PNG only for edits)
            $allowedTypes = ['image/png'];
            $imageType = mime_content_type($image['tmp_name']);
            $maskType = mime_content_type($mask['tmp_name']);

            if (!in_array($imageType, $allowedTypes) || !in_array($maskType, $allowedTypes)) {
                return $this->response->setJSON([
                    'error' => 'Only PNG images are supported'
                ])->setStatusCode(400);
            }

            // Call DALL-E image edits endpoint
            $response = $this->callOpenAIImageEdit($image['tmp_name'], $mask['tmp_name'], $prompt);

            if (isset($response['error'])) {
                return $this->response->setJSON([
                    'error' => $response['error']['message'] ?? 'Unknown error'
                ])->setStatusCode(500);
            }

            return $this->response->setJSON($response)->setStatusCode(200);

        } catch (\Exception $e) {
            log_message('error', 'Image edit error: ' . $e->getMessage());
            return $this->response->setJSON([
                'error' => 'Failed to edit image'
            ])->setStatusCode(500);
        }
    }

    // =========== Private Helper Methods

    private function callOpenAIImageGeneration($requestData)
    {
        $ch = curl_init('https://api.openai.com/v1/images/generations');
        
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($requestData),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->apiKey
            ],
            CURLOPT_TIMEOUT => 60
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new \RuntimeException('cURL error: ' . $error);
        }
        
        curl_close($ch);

        return json_decode($response, true);
    }

    private function callOpenAIImageEdit($imagePath, $maskPath, $prompt)
    {
        $ch = curl_init('https://api.openai.com/v1/images/edits');
        
        // Create CURLFile objects for file upload
        $postFields = [
            'image' => new \CURLFile($imagePath, 'image/png', 'image.png'),
            'mask' => new \CURLFile($maskPath, 'image/png', 'mask.png'),
            'prompt' => $prompt,
            'n' => 1,
            'size' => '256x256',
            'response_format' => 'b64_json'
        ];

        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postFields,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $this->apiKey
            ],
            CURLOPT_TIMEOUT => 60
        ]);

        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new \RuntimeException('cURL error: ' . $error);
        }
        
        curl_close($ch);

        return json_decode($response, true);
    }
}