<?php

namespace AcademyHQ\API\Repository\OSA;

use AcademyHQ\API\Common\Credentials;
use AcademyHQ\API\HTTP\Request\Request as Request;
use AcademyHQ\API\Repository\BaseRepository;
use AcademyHQ\API\ValueObjects as VO;
use Guzzle\Http\Client as GuzzleClient;

class ClassroomRepository extends BaseRepository
{

    public function __construct(Credentials $credentials)
    {
        parent::__construct();
        $this->credentials = $credentials;
        // $this->base_url .= '/classroom';
    }

    /**
     * @return response
     */

    public function public_book(

        VO\Integer $booking_id = null,
        VO\Integer $course_id = null,
        VO\Integer $classroom_id = null,
        VO\Integer $no_seats = null,
        VO\StringVO $classroom_dates = null,
        VO\StringVO $attendees = null,
        VO\User $booking_user = null,
        VO\StringVO $booking_date = null,
        VO\Boolean $paid = null,
        VO\StringVO $transaction_id = null,
        VO\StringVO $payment_status = null,
        VO\StringVO $type = null  
    ) {

        $request = new Request(
            new GuzzleClient,
            $this->credentials,
            VO\HTTP\Url::fromNative($this->base_url . '/classroom/book/public'),
            new VO\HTTP\Method('POST')
        );

        $request_parameters = array();

        if (!is_null($booking_id)) {
            $request_parameters['booking_id'] = $booking_id->__toInteger();
        }

        if (!is_null($course_id)) {
            $request_parameters['course_id'] = $course_id->__toInteger();
        }

        if (!is_null($classroom_id)) {
            $request_parameters['classroom_id'] = $classroom_id->__toInteger();
        }

        if (!is_null($no_seats)) {
            $request_parameters['no_seats'] = $no_seats->__toInteger();
        }

        if (!is_null($classroom_dates)) {
            $request_parameters['classroom_dates'] = $classroom_dates->__toString();
        }

        if (!is_null($attendees)) {
            $request_parameters['attendees'] = $attendees->__toString();
        }

        if (!is_null($booking_user)) {
            $request_parameters['booking_user'] = json_encode($booking_user->__toObject());

        }

        if (!is_null($booking_date)) {
            $request_parameters['booking_date'] = $booking_date->__toString();
        }

        if (!is_null($paid)) {
            $request_parameters['paid'] = $paid->__toBoolean();
        }

        if (!is_null($transaction_id)) {
            $request_parameters['transaction_id'] = $transaction_id->__toString();
        }

        if (!is_null($payment_status)) {
            $request_parameters['payment_status'] = $payment_status->__toString();
        }

        if (!is_null($type)) {
            $request_parameters['type'] = $type->__toString();
        }

        $response = $request->send($request_parameters);

        return $response->get_data();

    }

    /**
     * @return response
     */

    public function private_book(

        VO\Integer $booking_id = null,
        VO\Integer $course_id = null,
        VO\Integer $no_seats = null,
        VO\StringVO $event_dates = null,
        VO\Integer $payment_status = null,
        VO\StringVO $booking_description = null,
        VO\StringVO $payment_information = null,
        VO\StringVO $client_name = null,
        VO\StringVO $admin_first_name = null,
        VO\StringVO $admin_last_name = null,
        VO\StringVO $admin_email = null,
        VO\StringVO $attendees = null
    ) {

        $request = new Request(
            new GuzzleClient,
            $this->credentials,
            VO\HTTP\Url::fromNative($this->base_url . '/classroom/book/private'),
            new VO\HTTP\Method('POST')
        );

        $request_parameters = array();

        if (!is_null($booking_id)) {
            $request_parameters['booking_id'] = $booking_id->__toInteger();
        }

        if (!is_null($course_id)) {
            $request_parameters['course_id'] = $course_id->__toInteger();
        }

        if (!is_null($no_seats)) {
            $request_parameters['no_seats'] = $no_seats->__toInteger();
        }

        if (!is_null($event_dates)) {
            $request_parameters['event_dates'] = $event_dates->__toString();
        }

        if (!is_null($payment_status)) {
            $request_parameters['payment_status'] = $payment_status->__toInteger();
        }

        if (!is_null($booking_description)) {
            $request_parameters['booking_description'] = $booking_description->__toString();
        }

        if (!is_null($payment_information)) {
            $request_parameters['payment_information'] = $payment_information->__toString();
        }

        if (!is_null($client_name)) {
            $request_parameters['client_name'] = $client_name->__toString();
        }

        if (!is_null($admin_first_name)) {
            $request_parameters['admin_first_name'] = $admin_first_name->__toString();
        }

        if (!is_null($admin_last_name)) {
            $request_parameters['admin_last_name'] = $admin_last_name->__toString();
        }

        if (!is_null($admin_email)) {
            $request_parameters['admin_email'] = $admin_email->__toString();
        }

        $response = $request->send($request_parameters);

        return $response->get_data();

    }

    /**
     * @return response
     */

    public function get_organisations(
        VO\StringVO $search = null,
        VO\Integer $current_page = null,
        VO\Integer $per_page = null
    ) {
        $request = new Request(
            new GuzzleClient,
            $this->credentials,
            VO\HTTP\Url::fromNative($this->base_url . '/olive/safety/organizations/fetch'),
            new VO\HTTP\Method('POST')
        );

        $request_parameters = array();

        if (!is_null($search)) {
            $request_parameters['search'] = $search->__toString();
        }

        if (!is_null($current_page)) {
            $request_parameters['current_page'] = $current_page->__toInteger();
        }

        if (!is_null($per_page)) {
            $request_parameters['per_page'] = $per_page->__toInteger();
        }

        $response = $request->send($request_parameters);

        return $response->get_data();

    }

    /**
     * @return response
     */

    public function get_organisation_admins(
        VO\Integer $organisation_id = null,
        VO\StringVO $search = null,
        VO\Integer $current_page = null,
        VO\Integer $per_page = null
    ) {

        $request = new Request(
            new GuzzleClient,
            $this->credentials,
            VO\HTTP\Url::fromNative($this->base_url . '/olive/safety/organization/members/fetch'),
            new VO\HTTP\Method('POST')
        );

        $request_parameters = array();

        if (!is_null($organisation_id)) {
            $request_parameters['organisation_id'] = $organisation_id->__toInteger();
        }

        if (!is_null($search)) {
            $request_parameters['search'] = $search->__toString();
        }

        if (!is_null($per_page)) {
            $request_parameters['per_page'] = $per_page->__toInteger();
        }

        if (!is_null($current_page)) {
            $request_parameters['current_page'] = $current_page->__toInteger();
        }

        if (!is_null($per_page)) {
            $request_parameters['per_page'] = $per_page->__toInteger();
        }

        $response = $request->send($request_parameters);

        return $response->get_data();

    }

    /**
     * @return response
     */

    public function create_organisation_post(

        VO\StringVO $name = null,
        VO\StringVO $domain = null,
        VO\StringVO $plan = null,
        VO\StringVO $language = null,
        VO\StringVO $country = null,
        VO\StringVO $currency = null

    ) {

        $request = new Request(
            new GuzzleClient,
            $this->credentials,
            VO\HTTP\Url::fromNative($this->base_url . '/olive/safety/organization/create'),
            new VO\HTTP\Method('POST')
        );

        $request_parameters = array();

        if (!is_null($name)) {
            $request_parameters['name'] = $name->__toString();
        }

        if (!is_null($domain)) {
            $request_parameters['domain'] = $domain->__toString();
        }

        if (!is_null($plan)) {
            $request_parameters['plan'] = $plan->__toString();
        }

        if (!is_null($language)) {
            $request_parameters['language'] = $language->__toString();
        }

        if (!is_null($country)) {
            $request_parameters['country'] = $country->__toString();
        }

        if (!is_null($currency)) {
            $request_parameters['currency'] = $currency->__toString();
        }

        $response = $request->send($request_parameters);

        return $response->get_data();

    }

    /**
     * @return response
     */

    public function create_organisation_admin_post(

        VO\StringVO $first_name = null,
        VO\StringVO $last_name = null,
        VO\StringVO $email = null,
        VO\Integer $organisation_id = null

    ) {

        $request = new Request(
            new GuzzleClient,
            $this->credentials,
            VO\HTTP\Url::fromNative($this->base_url . '/olive/safety/organization/admin/create'),
            new VO\HTTP\Method('POST')
        );

        $request_parameters = array();

        if (!is_null($first_name)) {
            $request_parameters['first_name'] = $first_name->__toString();
        }

        if (!is_null($last_name)) {
            $request_parameters['last_name'] = $last_name->__toString();
        }

        if (!is_null($email)) {
            $request_parameters['email'] = $email->__toString();
        }

        if (!is_null($organisation_id)) {
            $request_parameters['organisation_id'] = $organisation_id->__toInteger();
        }

        $response = $request->send($request_parameters);

        return $response->get_data();

    }

}
