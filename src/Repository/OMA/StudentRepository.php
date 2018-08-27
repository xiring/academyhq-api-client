<?php

namespace AcademyHQ\API\Repository\OMA;

use AcademyHQ\API\ValueObjects as VO;
use AcademyHQ\API\HTTP\Request\Request as Request;
use Guzzle\Http\Client as GuzzleClient;
use AcademyHQ\API\Common\Credentials;
use AcademyHQ\API\Repository\BaseRepository;

class StudentRepository extends BaseRepository
{
    public function __construct(Credentials $credentials)
    {
        parent::__construct();
        $this->credentials = $credentials;
        $this->base_url .= '/oma';
    }

    public function list_member_apprenticeship(
        VO\Token $token
       
    ){
        $request = new Request(
            new GuzzleClient,
            $this->credentials,
            VO\HTTP\Url::fromNative($this->base_url.'/student/list/member/apprenticeship'),
            new VO\HTTP\Method('POST')
        );

        $header_parameters = array('Authorization' => $token->__toEncodedString());

        $response = $request->send(array(),$header_parameters);

        $data = $response->get_data();

        return $data;
    }


    public function list_vip_members(
        VO\Token $token
    
    ) {
        $request = new Request(
            new GuzzleClient,
            $this->credentials,
            VO\HTTP\Url::fromNative($this->base_url.'/student/list/vip/members'),
            new VO\HTTP\Method('POST')
        );

        $header_parameters = array('Authorization' => $token->__toEncodedString());

        $response = $request->send(array(),$header_parameters);

        $data = $response->get_data();

        return $data;
    }


    

    
}
