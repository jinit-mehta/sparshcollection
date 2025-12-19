namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Email\Email;

class Contact extends Controller
{
public function submit()
{
helper(['form', 'url']);
$validation = \Config\Services::validation();

// Set validation rules
$validation->setRules([
'name' => 'required|min_length[3]',
'email' => 'required|valid_email',
'phone' => 'required',
'query' => 'required|min_length[10]',
]);

if (!$validation->withRequest($this->request)->run()) {
// Validation failed, redirect with errors
return redirect()->back()->withInput()->with('errorMessage', 'Please fill in all required fields correctly.');
} else {
// Validation passed, send the email
$email = \Config\Services::email();

$email->setFrom('your-email@example.com', 'Your Name'); // Set your from email
$email->setTo('thesparshcollection@gmail.com'); // Set destination email address
$email->setSubject('New Contact Form Submission');
$email->setMessage(
'<p><strong>Name:</strong> ' . $this->request->getPost('name') . '</p>' .
'<p><strong>Email:</strong> ' . $this->request->getPost('email') . '</p>' .
'<p><strong>Contact Number:</strong> ' . $this->request->getPost('phone') . '</p>' .
'<p><strong>Query:</strong></p>
<p>' . $this->request->getPost('query') . '</p>'
);

if ($email->send()) {
return redirect()->back()->with('successMessage', 'Your message has been sent successfully.');
} else {
return redirect()->back()->with('errorMessage', 'There was an error sending your message. Please try again later.');
}
}
}
}