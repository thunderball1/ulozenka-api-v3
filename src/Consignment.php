<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ulozenka\APIv3;

/**
 * Description of Consignment
 *
 * @author Petr Vácha <petr.vacha@thunderweb.cz>
 */
class Consignment {

    /** @var integer */
    private $id;

    /** @var \Ulozenka\APIv3\Recipient */
    private $recipient;

    /** @var string */
    private $orderNumber;

    /** @var string */
    private $partnerConsignmentId;

    /** @var integer */
    private $variable;

    /** @var integer */
    private $parcelCount;

    /** @var double */
    private $cashOnDelivery;

    /** @var double */
    private $insurance;

    /** @var double */
    private $statedPrice;

    /** @var string */
    private $currency;

    /** @var string */
    private $password;

    /** @var integer */
    private $registerBranchId;

    /** @var integer */
    private $destinationBranchId;

    /** @var string */
    private $timeCreated;

    /** @var string */
    private $timeReceived;

    /** @var string */
    private $maxStoringDate;

    /** @var string */
    private $timeClosed;

    /** @var Status */
    private $status;

    /** @var string */
    private $parcelNumber;

    /** @var double */
    private $weight;

    /** @var boolean */
    private $requireFullAge;

    /** @var boolean */
    private $allowCardPayment;

    /** @var boolean */
    private $cardPaid;

    /** @var string */
    private $note;

    /** @var string */
    private $timeUpdated;

    /** @var string */
    private $timeCodSent;

    /** @var string */
    private $timeInvoiceSent;

    /** @var integer */
    private $transportServiceId;

    /** @var boolean */
    private $maxStoringDateIncreasedByClient;

    /** @var boolean */
    private $maxStoringDateIncreasedByPartner;

    public function __construct($data) {
        $this->setId($data['id']);
        $recipient = new Recipient();
        $recipient->setCompany($data['company_name']);
        $recipient->setCountry($data['address_state']);
        $recipient->setEmail($data['customer_email']);
        $recipient->setName($data['customer_name']);
        $recipient->setPhone($data['customer_phone']);
        $recipient->setStreet($data['address_street']);
        $recipient->setSurname($data['customer_surname']);
        $recipient->setTown($data['address_town']);
        $recipient->setZip($data['address_zip']);
        $this->setRecipient($recipient);
        $this->setOrderNumber($data['order_number']);
        $this->setPartnerConsignmentId($data['partner_consignment_id']);
        $this->setVariable($data['variable']);
        $this->setParcelCount($data['parcel_count']);
        $this->setCashOnDelivery($data['cash_on_delivery']);
        $this->setInsurance($data['insurance']);
        $this->setStatedPrice($data['stated_price']);
        $this->setCurrency($data['currency']);
        $this->setPassword($data['password']);
        $this->setRegisterBranchId($data['register_branch_id']);
        $this->setDestinationBranchId($data['destination_branch_id']);
        $timeCreated = $this->formatTime($data, 'time_created');
        $this->setTimeCreated($timeCreated);
        $timeReceived = $this->formatTime($data, 'time_received');
        $this->setTimeReceived($timeReceived);
        $this->setMaxStoringDate($data['max_storing_date']);
        $timeClosed = $this->formatTime($data, 'time_closed');
        $this->setTimeClosed($timeClosed);
        $status = new Status($data['status']['id'], $data['status']['name']);
        $this->setStatus($status);
        $this->setParcelNumber($data['parcel_number']);
        $this->setWeight($data['weight']);
        $this->setRequireFullAge($data['require_full_age'] ? true : false);
        $this->setAllowCardPayment($data['allow_card_payment'] ? true : false);
        $this->setCardPaid($data['card_paid'] ? true : false);
        $this->setNote($data['note']);
        $timeUpdated = $this->formatTime($data, 'time_updated');
        $this->setTimeUpdated($timeUpdated);
        $timeCodSent = $this->formatTime($data, 'time_cod_sent');
        $this->setTimeCodSent($timeCodSent);
        $timeInvoiceSent = $this->formatTime($data, 'time_invoice_sent');
        $this->setTimeInvoiceSent($timeInvoiceSent);
        $this->setTransportServiceId($data['transport_service_id']);
        $this->setMaxStoringDateIncreasedByClient($data['max_storing_date_increased_by_client'] ? true : false);
        $this->setMaxStoringDateIncreasedByPartner($data['max_storing_date_increased_by_partner'] ? true : false);
    }

    private function formatTime($data, $index) {
        if ($data[$index] === null) {
            $time = null;
        } else {
            $time = new \DateTime($data[$index]['date']);
        }
        return $time;
    }

    function getId() {
        return $this->id;
    }

    function getRecipient() {
        return $this->recipient;
    }

    function getOrderNumber() {
        return $this->orderNumber;
    }

    function getPartnerConsignmentId() {
        return $this->partnerConsignmentId;
    }

    function getVariable() {
        return $this->variable;
    }

    function getParcelCount() {
        return $this->parcelCount;
    }

    function getCashOnDelivery() {
        return $this->cashOnDelivery;
    }

    function getInsurance() {
        return $this->insurance;
    }

    function getStatedPrice() {
        return $this->statedPrice;
    }

    function getCurrency() {
        return $this->currency;
    }

    function getPassword() {
        return $this->password;
    }

    function getRegisterBranchId() {
        return $this->registerBranchId;
    }

    function getDestinationBranchId() {
        return $this->destinationBranchId;
    }

    function getTimeCreated() {
        return $this->timeCreated;
    }

    function getTimeReceived() {
        return $this->timeReceived;
    }

    function getMaxStoringDate() {
        return $this->maxStoringDate;
    }

    function getTimeClosed() {
        return $this->timeClosed;
    }

    function getStatus() {
        return $this->status;
    }

    function getParcelNumber() {
        return $this->parcelNumber;
    }

    function getWeight() {
        return $this->weight;
    }

    function getRequireFullAge() {
        return $this->requireFullAge;
    }

    function getAllowCardPayment() {
        return $this->allowCardPayment;
    }

    function getCardPaid() {
        return $this->cardPaid;
    }

    function getNote() {
        return $this->note;
    }

    function getTimeUpdated() {
        return $this->timeUpdated;
    }

    function getTimeCodSent() {
        return $this->timeCodSent;
    }

    function getTimeInvoiceSent() {
        return $this->timeInvoiceSent;
    }

    function getTransportServiceId() {
        return $this->transportServiceId;
    }

    function getMaxStoringDateIncreasedByClient() {
        return $this->maxStoringDateIncreasedByClient;
    }

    function getMaxStoringDateIncreasedByPartner() {
        return $this->maxStoringDateIncreasedByPartner;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRecipient(\Ulozenka\APIv3\Recipient $recipient) {
        $this->recipient = $recipient;
    }

    function setOrderNumber($orderNumber) {
        $this->orderNumber = $orderNumber;
    }

    function setPartnerConsignmentId($partnerConsignmentId) {
        $this->partnerConsignmentId = $partnerConsignmentId;
    }

    function setVariable($variable) {
        $this->variable = $variable;
    }

    function setParcelCount($parcelCount) {
        $this->parcelCount = $parcelCount;
    }

    function setCashOnDelivery($cashOnDelivery) {
        $this->cashOnDelivery = $cashOnDelivery;
    }

    function setInsurance($insurance) {
        $this->insurance = $insurance;
    }

    function setStatedPrice($statedPrice) {
        $this->statedPrice = $statedPrice;
    }

    function setCurrency($currency) {
        $this->currency = $currency;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRegisterBranchId($registerBranchId) {
        $this->registerBranchId = $registerBranchId;
    }

    function setDestinationBranchId($destinationBranchId) {
        $this->destinationBranchId = $destinationBranchId;
    }

    function setTimeCreated($timeCreated) {
        $this->timeCreated = $timeCreated;
    }

    function setTimeReceived($timeReceived) {
        $this->timeReceived = $timeReceived;
    }

    function setMaxStoringDate($maxStoringDate) {
        $this->maxStoringDate = $maxStoringDate;
    }

    function setTimeClosed($timeClosed) {
        $this->timeClosed = $timeClosed;
    }

    function setStatus(Status $status) {
        $this->status = $status;
    }

    function setParcelNumber($parcelNumber) {
        $this->parcelNumber = $parcelNumber;
    }

    function setWeight($weight) {
        $this->weight = $weight;
    }

    function setRequireFullAge($requireFullAge) {
        $this->requireFullAge = $requireFullAge;
    }

    function setAllowCardPayment($allowCardPayment) {
        $this->allowCardPayment = $allowCardPayment;
    }

    function setCardPaid($cardPaid) {
        $this->cardPaid = $cardPaid;
    }

    function setNote($note) {
        $this->note = $note;
    }

    function setTimeUpdated($timeUpdated) {
        $this->timeUpdated = $timeUpdated;
    }

    function setTimeCodSent($timeCodSent) {
        $this->timeCodSent = $timeCodSent;
    }

    function setTimeInvoiceSent($timeInvoiceSent) {
        $this->timeInvoiceSent = $timeInvoiceSent;
    }

    function setTransportServiceId($transportServiceId) {
        $this->transportServiceId = $transportServiceId;
    }

    function setMaxStoringDateIncreasedByClient($maxStoringDateIncreasedByClient) {
        $this->maxStoringDateIncreasedByClient = $maxStoringDateIncreasedByClient;
    }

    function setMaxStoringDateIncreasedByPartner($maxStoringDateIncreasedByPartner) {
        $this->maxStoringDateIncreasedByPartner = $maxStoringDateIncreasedByPartner;
    }

}
