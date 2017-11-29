<?php

namespace AcademyHQ\API\Repository\WebClient;

use AcademyHQ\API\ValueObjects as VO;
use AcademyHQ\API\HTTP\Request\Request as Request;
use Guzzle\Http\Client as GuzzleClient;
use AcademyHQ\API\Common\Credentials;

class OrganisationAdminRepository {

	private $base_url = 'https://api.academyhq.com/api/v2/web/client';

	public function __construct(Credentials $credentials)
	{
		$this->credentials = $credentials;
	}

	public function edit_organisation(
		VO\Token $token,
		VO\StringVO $name = null,
		VO\Integer $number_of_employees = null,
		VO\WebAddress $web_address = null ,
		VO\Email $email_address = null,
		VO\PhoneNumber $phone_number = null,
		VO\Address $address = null,
		VO\FaxNumber $fax_number = null,
		VO\TaxNumber $tax_number =  null,
		VO\CroNumber $cro_number = null,
		VO\StringVO $latitude = null,
		VO\StringVO $longitude = null
	){

		$request = new Request(
			new GuzzleClient,
			$this->credentials,
			VO\HTTP\Url::fromNative($this->base_url.'/organisation/admin/edit/organisation'),
			new VO\HTTP\Method('PUT')
		);

		$header_parameters = array('Authorization' => $token->__toEncodedString());

		if($name) {
			$request_parameters['name'] = $name->__toString();
		}

		if($number_of_employees) {
			$request_parameters['number_of_employees'] = $number_of_employees->__toInteger();
		}

		if($web_address) {
			$request_parameters['web_address'] = $web_address->__toString();
		}

		if($email_address) {
			$request_parameters['email_address'] = $email_address->__toString();
		}

		if($phone_number) {
			$request_parameters['phone_number'] = $phone_number->__toString();
		}

		if($address) {
			$request_parameters['address'] = $address->__toString();
		}
		
		if($fax_number) {
			$request_parameters['fax_number'] = $fax_number->__toString();
		}

		if($tax_number) {
			$request_parameters['tax_number'] = $tax_number->__toString();
		}

		if($cro_number) {
			$request_parameters['cro_number'] = $cro_number->__toString();
		}

		if($latitude) {
			$request_parameters['latitude'] = $latitude->__toString();
		}

		if($longitude) {
			$request_parameters['longitude'] = $longitude->__toString();
		}

		$response = $request->send($request_parameters, $header_parameters);

		$data = $response->get_data();

		return $data;
	}

	public function create_base_member(
		VO\Token $token,
		VO\Integer $organisation_id,
		VO\Name $name,
		VO\StringVO $role = null,
		VO\StringVO $qualification = null ,
		VO\StringVO $occupation = null,
		VO\StringVO $comment = null,
		VO\Email $email = null,
		VO\PublicID $pub_id = null,
		VO\Integer $is_mentor =  null,
		VO\Integer $is_contact_person = null,
		VO\Integer $is_verifier = null,
		VO\Integer $send_email_to_set_password = null
	){

		$request = new Request(
			new GuzzleClient,
			$this->credentials,
			VO\HTTP\Url::fromNative($this->base_url.'/organisation/admin/create/base/member'),
			new VO\HTTP\Method('POST')
		);

		$header_parameters = array('Authorization' => $token->__toEncodedString());

		$request_parameters = array(
			'organisation_id' => $organisation_id->__toInteger(),
			'name' => $name->__toString(),
		);

		if($role) {
			$request_parameters['role'] = $role->__toString();
		}

		if($qualification) {
			$request_parameters['qualification'] = $qualification->__toString();
		}

		if($occupation) {
			$request_parameters['occupation'] = $occupation->__toString();
		}

		if($comment) {
			$request_parameters['comment'] = $comment->__toString();
		}
		
		if($email) {
			$request_parameters['email'] = $email->__toString();
		}

		if($pub_id) {
			$request_parameters['pub_id'] = $pub_id->__toString();
		}

		if($is_mentor) {
			$request_parameters['is_mentor'] = $is_mentor->__toInteger();
		}

		if($is_contact_person) {
			$request_parameters['is_contact_person'] = $is_contact_person->__toInteger();
		}

		if($is_verifier) {
			$request_parameters['is_verifier'] = $is_verifier->__toInteger();
		}

		if($send_email_to_set_password) {
			$request_parameters['send_email_to_set_password'] = $send_email_to_set_password->__toInteger();
		}

		$response = $request->send($request_parameters, $header_parameters);

		$data = $response->get_data();

		return $data;
	}

	public function create_candidate(
		VO\Token $token,
		VO\Integer $organisation_id,
		VO\Integer $occupation_id,
		VO\PublicID $pub_id,
		VO\StringVO $date_of_birth,
		VO\Name $name,
		VO\StringVO $gender,
		VO\StringVO $country_code,
		VO\StringVO $mobile_number,
		VO\Email $email,
		VO\Integer $disablility,
		VO\Integer $advice,
		VO\StringVO $street,
		VO\StringVO $city,
		VO\StringVO $state,
		VO\StringVO $country,
		VO\StringVO $postal_code,
 		VO\StringVO $signature_image = null,
		VO\StringVO $disablility_text = null,
		VO\StringVO $advice_text = null,
		VO\Integer $eye_test_document_id = null,
		VO\StringVO $eye_test_expiry = null,
		VO\StringVO $eye_test_document_key = null,
		VO\Integer $mimimum_educational_document_id = null,
		VO\StringVO $minimum_educational_expiry = null,
		VO\StringVO $minimum_educational_document_key = null
	){

		$request = new Request(
			new GuzzleClient,
			$this->credentials,
			VO\HTTP\Url::fromNative($this->base_url.'/organisation/admin/create/candidate'),
			new VO\HTTP\Method('POST')
		);

		$header_parameters = array('Authorization' => $token->__toEncodedString());

		$request_parameters = array(
			'organisation_id' => $organisation_id->__toInteger(),
			'occupation_id' => $occupation_id->__toInteger(),
			'pub_id' => $pub_id->__toString(),
			'date_of_birth' => $date_of_birth->__toString(),
			'first_name' => $name->get_first_name()->__toString(),
			'last_name' => $name->get_last_name()->__toString(),
			'gender' => $gender->__toString(),
			'country_code' => $country_code->__toString(),
			'mobile_number' => $mobile_number->__toString(),
			'email' => $email->__toString(),
			'disablility' => $disablility->__toInteger(),
			'advice' => $advice->__toInteger(),
			'street' => $street->__toString(),
			'city' => $city->__toString(),
			'state' => $state->__toString(),
			'country' => $country->__toString(),
			'postal_code' => $postal_code->__toString()
		);

		if($disablility == '1') {
			$request_parameters['disablility_text'] = $disablility_text->__toString();
		}

		if($advice == '1') {
			$request_parameters['advice_text'] = $advice_text->__toString();
		}

		if($signature_image) {
			$request_parameters['signature_image'] = $signature_image->__toString();
		}

		if($eye_test_document_id) {
			$request_parameters['eye_test_expiry'] = $eye_test_expiry->__toString();
			$request_parameters['eye_test_document_key'] = $eye_test_document_key->__toString();
		}

		if($mimimum_educational_document_id) {
			$request_parameters['minimum_educational_expiry'] = $minimum_educational_expiry->__toString();
			$request_parameters['minimum_educational_document_key'] = $minimum_educational_document_key->__toString();
		}

		$response = $request->send($request_parameters, $header_parameters);

		$data = $response->get_data();

		return $data;
	}

	public function fetch_un_registered_member(
		VO\Token $token,
		VO\OrganisationID $organisation_id
	)
	{
		$request = new Request(
			new GuzzleClient,
			$this->credentials,
			VO\HTTP\Url::fromNative($this->base_url.'/organisation/admin/'.$organisation_id.'/list/unregistered'),
			new VO\HTTP\Method('GET')
		);

		$header_parameters = array('Authorization' => $token->__toEncodedString());

		$response = $request->send($header_parameters);

		$data = $response->get_data();

		return $data;
	}
}