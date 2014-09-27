<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ulozenka\APIv3;

/**
 * Description of Api
 *
 * @author Petr Vácha <petr.vacha@thunderweb.cz>
 */
class Api {

    private $apiUrl;
    private $shopId;
    private $apiKey;
    private $errors;

    const CONSIGNMENT_RESOURCE = 'consignments';

    public function __construct($apiUrl, $shopId = null, $apiKey = null) {
        $this->apiUrl = $apiUrl;
        if (isset($shopId)) {
            $this->shopId = $shopId;
        }
        if (isset($apiKey)) {
            $this->apiKey = $apiKey;
        }
        $this->errors = array();
    }

    public function getErrors() {
        return $this->errors;
    }

    public function createConsignment(ConsignmentRequest $consignmentRequest) {
        $recipient = $consignmentRequest->getRecipient();
        if ($recipient == null) {
            $recipient = new Recipient();
        }
        $labelsRequest = $consignmentRequest->getLabelsRequest();
        $consignmentArray = array(
            'transport_service_id' => $consignmentRequest->getTransportServiceId(),
            'address_state' => $recipient->getCountry(),
            'register_branch_id' => $consignmentRequest->getRegisterBranchId(),
            'destination_branch_id' => $consignmentRequest->getDestinationBranchId(),
            'order_number' => $consignmentRequest->getOrderNumber(),
            'partner_consignment_id' => $consignmentRequest->getPartnerConsignmentId(),
            'parcel_count' => $consignmentRequest->getParcelCount(),
            'weight' => $consignmentRequest->getWeight(),
            'cash_on_delivery' => $consignmentRequest->getCashOnDelivery(),
            'insurance' => $consignmentRequest->getInsurance(),
            'stated_price' => $consignmentRequest->getStatedPrice(),
            'currency' => $consignmentRequest->getCurrency(),
            'variable' => $consignmentRequest->getValiable(),
            'password' => $consignmentRequest->getPassword(),
            'customer_name' => $recipient->getName(),
            'customer_surname' => $recipient->getSurname(),
            'company_name' => $recipient->getCompany(),
            'customer_phone' => $recipient->getPhone(),
            'customer_email' => $recipient->getEmail(),
            'address_street' => $recipient->getStreet(),
            'address_town' => $recipient->getTown(),
            'address_zip' => $recipient->getZip(),
            'allow_card_payment' => $consignmentRequest->getAllowCardPayment() ? 1 : 0,
            'require_full_age' => $consignmentRequest->getRequireFullAge() ? 1 : 0,
            'note' => $consignmentRequest->getNote()
        );
        if (isset($labelsRequest)) {
            $consignmentArray['labels'] = array(
                'type' => $labelsRequest->getType(),
                'first_position' => $labelsRequest->getFirstPosition(),
                'labels_per_page' => $labelsRequest->getLabelsPerPage(),
            );
        }
        $request = new Request($this->apiUrl, $this->shopId, $this->apiKey);
        $request->setType('POST');
        $request->setResource(self::CONSIGNMENT_RESOURCE);
        $request->setData($consignmentArray);
        $response = $request->getResponse();
        if ($response->isError()) {
            $this->errors = $response->getErrors();
            return false;
        } else {
            $data = $response->getData();
            return new Consignment($data[0]);
        }
    }

}
