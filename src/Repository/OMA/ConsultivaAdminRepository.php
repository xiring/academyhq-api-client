<?php

namespace AcademyHQ\API\Repository\OMA;

use AcademyHQ\API\ValueObjects as VO;
use AcademyHQ\API\HTTP\Request\Request as Request;
use Guzzle\Http\Client as GuzzleClient;
use AcademyHQ\API\Common\Credentials;
use AcademyHQ\API\Repository\BaseRepository;

class ConsultivaAdminRepository extends BaseRepository
{
    public function __construct(Credentials $credentials)
    {
        parent::__construct();
        $this->credentials = $credentials;
        $this->base_url .= '/oma';
    }

    public function listApprenticeship(
        VO\Token $token,
        VO\StringVO $search = null,
        VO\OrganisationID $organisation_id = null,
        VO\Integer $current_page
    ) {
        $request = new Request(
            new GuzzleClient,
            $this->credentials,
            VO\HTTP\Url::fromNative($this->base_url.'/consultiva/admin/list/apprenticeship'),
            new VO\HTTP\Method('POST')
        );

        $header_parameters = array('Authorization' => $token->__toEncodedString());

        $request_parameters = array(
            'search' => $search ? $search->__toString() : '',
            'current_page' => $current_page->__toInteger(),
            'organisation_id' => $organisation_id ? $organisation_id->__toString() : ''
        );

        $response = $request->send($request_parameters, $header_parameters);

        $data = $response->get_data();

        return $data;
    }


    public function list_student(
        VO\Token $token,
        VO\Integer $current_page,
        VO\StringVO $search = null,
        VO\OrganisationID $organisation_id = null,
        VO\ApprenticeshipID $apprenticeship_id = null,
        VO\MemberID $assessor_id = null,
        VO\MemberID $verifier_id = null,
	    VO\OccupationID $occupation_id = null
    ) {
        $request = new Request(
            new GuzzleClient,
            $this->credentials,
            VO\HTTP\Url::fromNative($this->base_url.'/consultiva/admin/list/student'),
            new VO\HTTP\Method('POST')
        );


        $header_parameters = array('Authorization' => $token->__toEncodedString());

        $request_parameters = array(
            'search' => $search ? $search->__toString() : '',
            'current_page' => $current_page->__toInteger(),
            'organisation_id' => $organisation_id ? $organisation_id->__toString() : '',
            'apprenticeship_id' => $apprenticeship_id ? $apprenticeship_id->__toString() : ''
        );

        if(!is_null($assessor_id)){
            $request_parameters['assessor_id'] = $assessor_id->__toString();
        }

        if(!is_null($verifier_id)){
            $request_parameters['verifier_id'] = $verifier_id->__toString();
        }

        if(!is_null($occupation_id)){
        	$request_parameters['occupation_id'] = $occupation_id->__toString();
        }

        $response = $request->send($request_parameters, $header_parameters);
        $data = $response->get_data();

        return $data;
    }



    public function create_student(
        VO\Token $token,
        VO\ApprenticeshipID $apprenticeship_id,
        VO\OrganisationID $organisation_id,
        VO\MemberID $assessor_id=null,
        VO\Name $name,
        VO\StringVO $gender,
        VO\StringVO $country_code,
        VO\Integer $mobile_number,
        VO\Email $email,
        VO\StringVO $nationality,
        VO\StringVO $street = null,
        VO\StringVO $city = null,
        VO\StringVO $state = null,
        VO\StringVO $country = null,
        VO\StringVO $postal_code = null,
        VO\Integer $disability,
        VO\StringVO $image = null,
        VO\MemberID $verifier_id = null,
        VO\StringVO $employment = null,
        VO\StringVO $further_notes = null,
        VO\StringVO $disability_text = null,
        VO\StringVO $date_of_birth = null,
        VO\Integer $weekly_learning_hours=null
    ) {
        $request =new Request(
            new GuzzleClient,
            $this->credentials,
            VO\HTTP\Url::fromNative($this->base_url.'/consultiva/admin/create/student'),
            new VO\HTTP\Method('POST')
        );

        $header_parameters = array('Authorization' => $token->__toEncodedString());

        $request_parameters = array(
            'apprenticeship_id' => $apprenticeship_id->__toString(),
            'organisation_id' => $organisation_id->__toString(),
            'first_name' => $name->get_first_name()->__toString(),
            'last_name' => $name->get_last_name()->__toString(),
            'gender' => $gender->__toString(),
            'country_code' => $country_code->__toString(),
            'mobile_number' => $mobile_number->__toInteger(),
            'email' => $email->__toString(),
            'nationality' => $nationality-> __toString(),
            'disability' => $disability->__toInteger()
        );

        if(!is_null($street)){
            $request_parameters['street'] = $street->__toString();
        }

        if(!is_null($city)){
            $request_parameters['city'] = $city->__toString();
        }

        if(!is_null($state)){
            $request_parameters['state'] = $state->__toString();
        }

        if(!is_null($country)){
            $request_parameters['country'] = $country->__toString();
        }

        if(!is_null($postal_code)){
            $request_parameters['postal_code'] = $postal_code->__toString();
        }

        if(!is_null($image)){
            $request_parameters['image'] = $image->__toString();
        }
        
        if(!is_null($assessor_id)){
            $request_parameters['assessor_id'] = $assessor_id->__toString();
        }
        
        if(!is_null($verifier_id)){
            $request_parameters['verifier_id'] = $verifier_id->__toString();
        }

        if(!is_null($employment)){
            $request_parameters['employment'] = $employment->__toString();
        }

        if(!is_null($further_notes)){
            $request_parameters['further_notes'] = $further_notes->__toString();
        }

        if(!is_null($date_of_birth)){
            $request_parameters['date_of_birth'] = $date_of_birth->__toString();
        }

        if(!is_null($disability_text)){
            $request_parameters['disability_text'] = $disability_text->__toString();
        }

        if(!is_null($weekly_learning_hours)){
            $request_parameters['weekly_learning_hours'] = $weekly_learning_hours->__toInteger();
        }

        $response = $request->send($request_parameters, $header_parameters);
        
       
        $data = $response->get_data();

        return $data;
    }


    //member program list 
    public function student_program_list(
        VO\Token $token,
        VO\Integer $member_apprenticeship_id
    
    ) {
        $request = new Request(
            new GuzzleClient,
            $this->credentials,
            VO\HTTP\Url::fromNative($this->base_url.'/consultiva/admin/list/student/programs'),
            new VO\HTTP\Method('POST')
        );
        $request_parameters = array(
            
            'member_apprenticeship_id' => $member_apprenticeship_id->__toInteger()
        );

        $header_parameters = array('Authorization' => $token->__toEncodedString());

        $response = $request->send($request_parameters, $header_parameters);
       
        $data = $response->get_data();

        return $data;
    }



public function student_program_details(
        VO\Token $token,
        VO\Integer $member_apprenticeship_id,
        VO\Integer $program_id
    
    ) {
        $request = new Request(
            new GuzzleClient,
            $this->credentials,
            VO\HTTP\Url::fromNative($this->base_url.'/consultiva/admin/student/program/details'),
            new VO\HTTP\Method('POST')
        );
        $request_parameters = array(
            
            'member_apprenticeship_id' => $member_apprenticeship_id->__toInteger(),
            'program_id' => $program_id->__toInteger()
        );

        $header_parameters = array('Authorization' => $token->__toEncodedString());

        $response = $request->send($request_parameters, $header_parameters);
       
        $data = $response->get_data();
        
        return $data;
    }

    /*alicrity get program phase details*/
    public function occupation_program_details(
        VO\Token $token,
        VO\Integer $occupation_id


    ) {
        $request = new Request(
            new GuzzleClient,
            $this->credentials,
            VO\HTTP\Url::fromNative($this->base_url.'/consultiva/admin/get/occupation/programs/details'),
            new VO\HTTP\Method('POST')
        );
        $header_parameters = array('Authorization' => $token->__toEncodedString());

        $request_parameters = array(
            
            'occupation_id'=>$occupation_id->__toInteger(),
       );
        $response = $request->send($request_parameters, $header_parameters);

        $data = $response->get_data();

        return $data;
    }

    public function create_member_apprenticeship(
        VO\Token $token,
        VO\ApprenticeshipID $apprenticeship_id,
        VO\OrganisationID $organisation_id,
        VO\MemberID $member_id,
        VO\MemberID $assessor_id=null,
        VO\StringVO $gender,
        VO\StringVO $country_code,
        VO\Integer $mobile_number,
        VO\StringVO $nationality,
        VO\StringVO $street = null,
        VO\StringVO $city = null,
        VO\StringVO $state = null,
        VO\StringVO $country = null,
        VO\StringVO $postal_code = null,
        VO\Integer $disability,
        VO\StringVO $image = null,
        VO\MemberID $verifier_id = null,
        VO\StringVO $employment = null,
        VO\StringVO $further_notes = null,
        VO\StringVO $disability_text = null,
        VO\StringVO $date_of_birth = null,
        VO\Integer $weekly_learning_hours=null
    ) {
        $request =new Request(
            new GuzzleClient,
            $this->credentials,
            VO\HTTP\Url::fromNative($this->base_url.'/consultiva/admin/create/member/apprenticeship'),
            new VO\HTTP\Method('POST')
        );

        $header_parameters = array('Authorization' => $token->__toEncodedString());

        $request_parameters = array(
            'apprenticeship_id' => $apprenticeship_id->__toString(),
            'organisation_id' => $organisation_id->__toString(),
            'member_id' => $member_id->__toString(),
            'nationality' => $nationality-> __toString(),
            'disability' => $disability->__toInteger()
        );

        if(!is_null($street)){
            $request_parameters['street'] = $street->__toString();
        }

        if(!is_null($city)){
            $request_parameters['city'] = $city->__toString();
        }

        if(!is_null($state)){
            $request_parameters['state'] = $state->__toString();
        }

        if(!is_null($country)){
            $request_parameters['country'] = $country->__toString();
        }

        if(!is_null($postal_code)){
            $request_parameters['postal_code'] = $postal_code->__toString();
        }

        if(!is_null($image)){
            $request_parameters['image'] = $image->__toString();
        }

        if(!is_null($assessor_id)){
            $request_parameters['assessor_id'] = $assessor_id->__toString();
        }

        if(!is_null($verifier_id)){
            $request_parameters['verifier_id'] = $verifier_id->__toString();
        }

        if(!is_null($gender)){
            $request_parameters['gender'] = $gender->__toString();
        }

        if(!is_null($country_code)){
            $request_parameters['country_code'] = $country_code->__toString();
        }


        if(!is_null($mobile_number)){
            $request_parameters['mobile_number'] = $mobile_number->__toInteger();
        }

        if(!is_null($employment)){
            $request_parameters['employment'] = $employment->__toString();
        }

        if(!is_null($further_notes)){
            $request_parameters['further_notes'] = $further_notes->__toString();
        }

        if(!is_null($disability_text)){
            $request_parameters['disability_text'] = $disability_text->__toString();
        }

        if(!is_null($weekly_learning_hours)){
            $request_parameters['weekly_learning_hours'] = $weekly_learning_hours->__toInteger();
        }

        $response = $request->send($request_parameters, $header_parameters);

        $data = $response->get_data();

        return $data;
    }


    public function assign_member_apprenticeship_vip(
        VO\Token $token,
        VO\ID $member_apprenticeship_id,
        VO\MemberID $member_id,
        VO\Integer $is_verifier=null,
        VO\Integer $is_assessor=null
    ) {
        $request = new Request(
            new GuzzleClient,
            $this->credentials,
            VO\HTTP\Url::fromNative($this->base_url.'/consultiva/admin/member/apprenticeship/assign/vip'),
            new VO\HTTP\Method('POST')
        );
        $header_parameters = array('Authorization' => $token->__toEncodedString());

        $request_parameters = array(
            
            'member_apprenticeship_id' => $member_apprenticeship_id->__toString(),
            'member_id' => $member_id->__toString()
        );

        if(!is_null($is_verifier)) {
            $request_parameters['is_verifier'] = $is_verifier->__toInteger();
        }

        if(!is_null($is_assessor)) {
            $request_parameters['is_assessor'] = $is_assessor->__toInteger();
        }        
        
        $response = $request->send($request_parameters, $header_parameters);

        $data = $response->get_data();

        return $data;
    }
}
