<?php

class Create_csr extends CI_Controller {
	public function index()
	{
		$this->load->model("user");
		$this->load->database();
		$result = $this->user->get_info($this->session->userdata('username'));
		$data['nama'] =  $result->nama;
		$data['password'] =  $result->password;
		$data['error'] =  "";
		$this->load->view('create_csr',$data);
	}
	public function add_csr(){

		include('include/File/X509.php');
		include('include/Crypt/RSA.php');
		$email = $this->input->post('email');
		$name = $this->input->post('name');
		$country = $this->input->post('country');
		$province = $this->input->post('province');
		$city = $this->input->post('city');
		$organization = $this->input->post('organization');
		$unit = $this->input->post('unit');

		// create private key for CA cert
		$CAPrivKey = new Crypt_RSA();
		extract($CAPrivKey->createKey());
		$CAPrivKey->loadKey($privatekey);

		$pubKey = new Crypt_RSA();
		$pubKey->loadKey($publickey);
		$pubKey->setPublicKey();

		echo "the private key for the CA cert (can be discarded):\r\n\r\n";
		echo $privatekey;
		$privkey_ca = $privatekey;
		echo "\r\n\r\n";







		// create a self-signed cert that'll serve as the CA
		$subject = new File_X509();
		$subject->setDNProp('id-emailAddress', $email);
		$subject->setDNProp('id-at-name', $name);
		$subject->setDNProp('id-at-countryName', $country);
		$subject->setDNProp('id-at-stateOrProvinceName', $province);
		$subject->setDNProp('id-at-localityName', $city);
		$subject->setDNProp('id-at-organizationName', $organization);
		$subject->setDNProp('id-at-dnQualifier', $unit);
		$subject->setPublicKey($pubKey);

		$issuer = new File_X509();
		$issuer->setPrivateKey($CAPrivKey);
		$issuer->setDN($CASubject = $subject->getDN());

		$x509 = new File_X509();
		$x509->makeCA();

		$result = $x509->sign($issuer, $subject);
		echo "the CA cert to be imported into the browser is as follows:\r\n\r\n";
		//echo $x509->saveX509($result);
		$ca_cert = $x509->saveX509($result);
		echo $ca_cert;
		echo "\r\n\r\n";








		// create private key / x.509 cert for stunnel / website
		$privKey = new Crypt_RSA();
		extract($privKey->createKey());
		$privKey->loadKey($privatekey);

		$pubKey = new Crypt_RSA();
		$pubKey->loadKey($publickey);
		$pubKey->setPublicKey();

		$subject = new File_X509();
		//$subject->setDNProp('id-at-organizationName', 'phpseclib demo cert');
		$subject->setDNProp('id-emailAddress', $email);
		$subject->setDNProp('id-at-name', $name);
		$subject->setDNProp('id-at-countryName', $country);
		$subject->setDNProp('id-at-stateOrProvinceName', $province);
		$subject->setDNProp('id-at-localityName', $city);
		$subject->setDNProp('id-at-organizationName', $organization);
		$subject->setDNProp('id-at-dnQualifier', $unit);

		$subject->setPublicKey($pubKey);

		$issuer = new File_X509();
		$issuer->setPrivateKey($CAPrivKey);
		$issuer->setDN($CASubject);

		$x509 = new File_X509();
		$result = $x509->sign($issuer, $subject);
		echo "the stunnel.pem contents are as follows:\r\n\r\n";
		//echo $privKey->getPrivateKey();
		$privkey_stunnel = $privKey->getPrivateKey();
		echo $privkey_stunnel;
		echo "\r\n";
		
		//echo $x509->saveX509($result);
		$ca_stunnel = $x509->saveX509($result);
		echo $ca_stunnel;
		echo "\r\n";

		$this->load->model("csr");
		$data = array(
			"email" => $this->input->post('email'),
			"name" => $this->input->post('name'),
			"country" => $this->input->post('country'),
			"province" => $this->input->post('province'),
			"city" => $this->input->post('city'),
			"organization" => $this->input->post('organization'),
			"unit" => $this->input->post('unit'),
			"privkey_ca" => $privkey_ca,
			"ca_cert" => $ca_cert,
			"privkey_stunnel" => $privkey_stunnel,
			"ca_stunnel" => $ca_stunnel
			);
		$this->load->database();
		$this->csr->add_csr($data);
		/*
		$this->load->model("csr");
		$data = array(
			"email" => $this->input->post('email'),
			"name" => $this->input->post('name'),
			"country" => $this->input->post('country'),
			"province" => $this->input->post('province'),
			"city" => $this->input->post('city'),
			"organization" => $this->input->post('organization'),
			"unit" => $this->input->post('unit')
			);
		$this->load->database();
		$this->csr->add_csr($data);
		/*$dn = array(
		    "countryName" => "UK",
		    "stateOrProvinceName" => "Somerset",
		    "localityName" => "Glastonbury",
		    "organizationName" => "The Brain Room Limited",
		    "organizationalUnitName" => "PHP Documentation Team",
		    "commonName" => "Wez Furlong",
		    "emailAddress" => "wez@example.com"
		);
		//$privkey = openssl_pkey_new();
		$NEW_KEY = openssl_pkey_new(array(
			'private_key_bits' => 1024,
			'private_key_type' => OPENSSL_KEYTYPE_RSA));
		openssl_pkey_export_to_file($NEW_KEY , 'private.key');
		$NEW_KEY_DETAILS = openssl_pkey_get_details($NEW_KEY);
		file_put_contents('public.key', $NEW_KEY_DETAILS['key']);
		openssl_free_key($NEW_KEY);

		/*$csr = openssl_csr_new($dn,$privkey);
		//$sscert = openssl_csr_sign($csr,null,$privkey,365);
		$sscert = openssl_csr_sign($csr, null, $privkey, 365);
		openssl_csr_export($csr, $csrout) and var_dump($csrout);
		openssl_x509_export($sscert, $certout) and var_dump($certout);
		openssl_pkey_export($privkey, $pkeyout, "mypassword") and var_dump($pkeyout);
		while (($e = openssl_error_string()) !== false) {
    	echo $e . "\n";
		}*/
		//redirect(base_url("home/"));
/*
		$config = array(
    "digest_alg" => "sha512",
    "private_key_bits" => 4096,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
);
    
// Create the private and public key
$res = openssl_pkey_new($config);
echo $res;

// Extract the private key from $res to $privKey
openssl_pkey_export($res, $privKey);

// Extract the public key from $res to $pubKey
$pubKey = openssl_pkey_get_details($res);
$pubKey = $pubKey["key"];

$data = 'plaintext data goes here';

// Encrypt the data to $encrypted using the public key
openssl_public_encrypt($data, $encrypted, $pubKey);

// Decrypt the data using the private key and store the results in $decrypted
openssl_private_decrypt($encrypted, $decrypted, $privKey);

echo $decrypted;*/
	redirect(base_url("/list_csr"));
	}
	}
?>
