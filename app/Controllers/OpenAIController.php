<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Orhanerday\OpenAi\OpenAi;

class OpenAIController extends Controller
{
    public function index()
    {
        return view('admin/product/openai_form');
    }

    public function generateImages()
    {
        $openAi = new OpenAi(env('OPENAI_API_KEY'));

        $prompt = $this->request->getVar('prompt');


        $complete = $openAi->image([
            "prompt" => $prompt,
            "n" => 1,
            // number of images
            "size" => "256x256",
            // image dimension
            "response_format" => "b64_json",
            // use 'url' for less credit usage
        ]);
        // Pass the image data to the view
        // Check if $complete is a string (JSON) and decode it into an array
        $data['images'] = is_string($complete) ? json_decode($complete, true) : [];
        // Encode the array as a JSON string before sending the response
        $jsonResponse = json_encode($data['images']);
        // return $jsonResponse;

        // Return the JSON response
        return $this->response->setJSON($data['images'])->setStatusCode(200);
    }

    // =========== Edit Image
    public function editImage()
    {
        // Handle image and mask upload here
        $image = $_FILES['image']['tmp_name'];
        $mask = $_FILES['mask']['tmp_name'];
        $prompt = $this->request->getVar('prompt');

        // Prepare data for DALL·E image edits endpoint
        $formData = [
            'prompt' => $prompt,
            'image' => base64_encode(file_get_contents($image)),
            'mask' => base64_encode(file_get_contents($mask))
        ];

        // Call DALL·E image edits endpoint
        $response = $this->callDALLEImageEditsEndpoint($formData);

        // Return the edited image response to the frontend
        return $this->response->setJSON($response)->setStatusCode(200);
    }

    private function callDALLEImageEditsEndpoint($formData)
    {
        // Make a POST request to the DALL·E image edits endpoint using cURL or any HTTP client library
        // Example using cURL:
        $ch = curl_init('https://api.openai.com/v1/edit');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($formData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer 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'
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        // Decode the JSON response and return it
        return json_decode($response, true);
    }

}