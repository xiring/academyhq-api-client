<?php

namespace AcademyHQ\API\Repository\WebClient;

use AcademyHQ\API\ValueObjects as VO;
use AcademyHQ\API\HTTP\Request\Request as Request;
use Guzzle\Http\Client as GuzzleClient;
use AcademyHQ\API\Common\Credentials;
use AcademyHQ\API\Repository\BaseRepository;

class GDPRRepository extends BaseRepository {

	private function get_url(){		
		return $this->base_url.'/web/client/gdpr';
	}

	public function __construct(Credentials $credentials)
	{
		$this->credentials = $credentials;
	}

	public function sub_org_create_inherit_domain(
		VO\StringVO $name
	){
	$request = new Request(
			new GuzzleClient,
			$this->credentials,
			VO\HTTP\Url::fromNative($this->get_url().'/create/sub_org/inherit/domain'),
			new VO\HTTP\Method('POST')
		);

		$request_parameters = array(
			'name' => $name->__toString()
		);

		$response = $request->send($request_parameters);

		$data = $response->get_data();

		return $data;
	}

	public function create_partner_with_apis(
		VO\StringVO $name
	){
	$request = new Request(
			new GuzzleClient,
			$this->credentials,
			VO\HTTP\Url::fromNative($this->get_url().'/create/partner'),
			new VO\HTTP\Method('POST')
		);

		$request_parameters = array(
			'name' => $name->__toString()
		);

		$response = $request->send($request_parameters);

		$data = $response->get_data();

		return $data;
	} 

	public function create_sub_org_admin(
		VO\OrganisationID $organisation_id,
		VO\Name $name,
		VO\Email $email
	){

		$request = new Request(
			new GuzzleClient,
			$this->credentials,
			VO\HTTP\Url::fromNative($this->get_url().'/create/sub_org/admin'),
			new VO\HTTP\Method('POST')
		);

		$request_parameters = array(
			'organisation_id' => $organisation_id->__toString(),
			'first_name' => $name->get_first_name()->__toString(),
			'last_name' => $name->get_last_name()->__toString(),
			'email' => $email->__toString()
		);

		$response = $request->send($request_parameters);

		$data = $response->get_data();

		return $data;

	}

	public function create_license(
		VO\OrganisationID $organisation_id,
		VO\CourseID $course_id,
		VO\MemberID $admin_id,
		VO\Integer $number_of_license,
		VO\StringVO $price,
		VO\StringVO $currency,
		VO\StringVO $vat_rate,
		VO\StringVO $vat_number
	){

		$request = new Request(
			new GuzzleClient,
			$this->credentials,
			VO\HTTP\Url::fromNative($this->get_url().'/create/license'),
			new VO\HTTP\Method('POST')
		);

		$request_parameters = array(
			'organisation_id' => $organisation_id->__toString(),
			'course_id' => $course_id->__toString(),
			'admin_id' => $admin_id->__toString(),
			'number_of_license' => $number_of_license->__toInteger(),
			'price' => $price->__toString(),
			'currency' => $currency->__toString(),
			'vat_rate' => $vat_rate->__toString(),
			'vat_number' => $vat_number->__toString()
		);

		$response = $request->send($request_parameters);

		$data = $response->get_data();

		return $data;

	}

	public function create_license_new(
		VO\OrganisationID $organisation_id,
		VO\CourseID $course_id,
		VO\MemberID $admin_id,
		VO\Integer $number_of_license,
		VO\StringVO $price,
		VO\StringVO $currency,
		VO\StringVO $vat_rate,
		VO\StringVO $vat_number
	){

		$request = new Request(
			new GuzzleClient,
			$this->credentials,
			VO\HTTP\Url::fromNative($this->get_url().'/create/newlicense'),
			new VO\HTTP\Method('POST')
		);

		$request_parameters = array(
			'organisation_id' => $organisation_id->__toString(),
			'course_id' => $course_id->__toString(),
			'admin_id' => $admin_id->__toString(),
			'number_of_license' => $number_of_license->__toInteger(),
			'price' => $price->__toString(),
			'currency' => $currency->__toString(),
			'vat_rate' => $vat_rate->__toString(),
			'vat_number' => $vat_number->__toString()
		);

		$response = $request->send($request_parameters);

		$data = $response->get_data();

		return $data;

	}

	public function create_member(
		VO\OrganisationID $organisation_id,
		VO\Name $name,
		VO\Email $email
	){
		$request = new Request(
			new GuzzleClient,
			$this->credentials,
			VO\HTTP\Url::fromNative($this->get_url().'/create/member'),
			new VO\HTTP\Method('POST')
		);

		$request_parameters = array(
			'organisation_id' => $organisation_id->__toString(),
			'first_name' => $name->get_first_name()->__toString(),
			'last_name' => $name->get_last_name()->__toString(),
			'email' => $email->__toString()
		);

		$response = $request->send($request_parameters);

		$data = $response->get_data();

		return $data;
	}

	public function create_enrolment(
		VO\MemberID $member_id,
		VO\CourseID $course_id
	){
		$request = new Request(
			new GuzzleClient,
			$this->credentials,
			VO\HTTP\Url::fromNative($this->get_url().'/create/enrolment'),
			new VO\HTTP\Method('POST')
		);

		$request_parameters = array(
			'member_id' => $member_id->__toString(),
			'course_id' => $course_id->__toString()
		);

		$response = $request->send($request_parameters);

		$data = $response->get_data();

		return $data;
	}

	public function check_license(VO\LicenseID $id){
		$license_id = $id->__toString();
		$request = new Request(
			new GuzzleClient,
			$this->credentials,
			VO\HTTP\Url::fromNative($this->get_url().'/is/license/'.$license_id.'/available'),
			new VO\HTTP\Method('GET')
		);

		$response = $request->send();

		$data = $response->get_data();

		return $data; 
	}

	public function rollback(
		VO\MemberID $member_id,
		VO\OrganisationID $organisation_id
	){
		$request = new Request(
			new GuzzleClient,
			$this->credentials,
			VO\HTTP\Url::fromNative($this->get_url().'/rollback'),
			new VO\HTTP\Method('POST')
		);

		$request_parameters = array(
			'member_id' => $member_id->__toString(),
			'organisation_id' => $organisation_id->__toString()
		);

		$response = $request->send($request_parameters);

		$data = $response->get_data();

		return $data;
	}

	public function vat_validate(
		VO\StringVO $country_code,
		VO\StringVO $vat_number
	){

		$request = new Request(
			new GuzzleClient,
			$this->credentials,
			VO\HTTP\Url::fromNative($this->get_url().'/validate/vat_number'),
			new VO\HTTP\Method('POST')
		);

		$request_parameters = array(
			'country_code' => $country_code->__toString(),
			'vat_number' => $vat_number->__toString()
		);

		$response = $request->send($request_parameters);

		$data = $response->get_data();

		return $data;

	}

}