<?php

namespace Ulozenka\APIv3;

/**
 * Description of ConsignmentRequest
 *
 * @author Petr Vácha <petr.vacha@thunderweb.cz>
 */
class ConsignmentRequest {

    /** @var integer */
    private $shopId;

    /** @var string */
    private $apiKey;

    /** @var Recipient */
    private $recipient;

    /** @var integer */
    private $transportServiceId;

    /** @var integer */
    private $registerBranchId;

    /** @var integer */
    private $destinationBranchId;

    /** @var string */
    private $orderNumber;

    /** @var string */
    private $partnerConsignmentId;

    /** @var integer */
    private $parcelCount;

    /** @var double */
    private $weight;

    /** @var double */
    private $cashOnDelivery;

    /** @var double */
    private $insurance;

    /** @var double */
    private $statedPrice;

    /** @var string */
    private $currency;

    /** @var integer */
    private $valiable;

    /** @var string */
    private $password;

    /** @var boolean */
    private $allowCardPayment;

    /** @var boolean */
    private $requireFullAge;

    /** @var string */
    private $note;

    /** @var LabelsRequest */
    private $labelsRequest;

    /**
     * 
     * @param integer $shopId
     * @param string $apiKey
     */
    function __construct() {
        
    }

    function getRecipient() {
        return $this->recipient;
    }

    function getTransportServiceId() {
        return $this->transportServiceId;
    }

    function getRegisterBranchId() {
        return $this->registerBranchId;
    }

    function getDestinationBranchId() {
        return $this->destinationBranchId;
    }

    function getOrderNumber() {
        return $this->orderNumber;
    }

    function getPartnerConsignmentId() {
        return $this->partnerConsignmentId;
    }

    function getParcelCount() {
        return $this->parcelCount;
    }

    function getWeight() {
        return $this->weight;
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

    function getValiable() {
        return $this->valiable;
    }

    function getPassword() {
        return $this->password;
    }

    function getAllowCardPayment() {
        return $this->allowCardPayment;
    }

    function getRequireFullAge() {
        return $this->requireFullAge;
    }

    function getNote() {
        return $this->note;
    }

    function getLabelsRequest() {
        return $this->labelsRequest;
    }

    function setLabelsRequest(LabelsRequest $labelsRequest) {
        $this->labelsRequest = $labelsRequest;
    }

    function setRecipient(Recipient $recipient) {
        $this->recipient = $recipient;
    }

    function setTransportServiceId($transportServiceId) {
        $this->transportServiceId = $transportServiceId;
    }

    function setRegisterBranchId($registerBranchId) {
        $this->registerBranchId = $registerBranchId;
    }

    function setDestinationBranchId($destinationBranchId) {
        $this->destinationBranchId = $destinationBranchId;
    }

    function setOrderNumber($orderNumber) {
        $this->orderNumber = $orderNumber;
    }

    function setPartnerConsignmentId($partnerConsignmentId) {
        $this->partnerConsignmentId = $partnerConsignmentId;
    }

    function setParcelCount($parcelCount) {
        $this->parcelCount = $parcelCount;
    }

    function setWeight($weight) {
        $this->weight = $weight;
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

    function setValiable($valiable) {
        $this->valiable = $valiable;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setAllowCardPayment($allowCardPayment) {
        $this->allowCardPayment = $allowCardPayment;
    }

    function setRequireFullAge($requireFullAge) {
        $this->requireFullAge = $requireFullAge;
    }

    function setNote($note) {
        $this->note = $note;
    }

}
