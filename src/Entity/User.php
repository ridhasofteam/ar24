<?php

namespace App\Entity;
use App\Entity\BaseField;

class User extends BaseField
{
    protected $firstname;

    protected $lastname;

    protected $email;

    protected $gender;

    protected $statut;

    protected $company;

    protected $company_siret;

    protected $company_tva;

    protected $country;

    protected $address1;

    protected $address2;

    protected $zipcode;

    protected $city;

    protected $notif_billing;

    protected $billing_email;

    protected $confirmed;

    protected $cgu;

    protected $notify_ev;

    protected $notify_ar;

    protected $notify_rf;

    protected $notify_ng;

    protected $notify_consent;

    protected $notify_eidas_to_valid;

    protected $notify_recipient_update;

    protected $notify_waiting_ar_answer;
    
    protected $is_legal_entity;



    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of statut
     */ 
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */ 
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get the value of company
     */ 
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set the value of company
     *
     * @return  self
     */ 
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get the value of company_siret
     */ 
    public function getCompanySiret()
    {
        return $this->company_siret;
    }

    /**
     * Set the value of company_siret
     *
     * @return  self
     */ 
    public function setCompanySiret($company_siret)
    {
        $this->company_siret = $company_siret;

        return $this;
    }

    /**
     * Get the value of company_tva
     */ 
    public function getCompanyTva()
    {
        return $this->company_tva;
    }

    /**
     * Set the value of company_tva
     *
     * @return  self
     */ 
    public function setCompanyTva($company_tva)
    {
        $this->company_tva = $company_tva;

        return $this;
    }

    /**
     * Get the value of country
     */ 
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */ 
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get the value of address1
     */ 
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set the value of address1
     *
     * @return  self
     */ 
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get the value of address2
     */ 
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set the value of address2
     *
     * @return  self
     */ 
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get the value of zipcode
     */ 
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set the value of zipcode
     *
     * @return  self
     */ 
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

 
    /**
     * Get the value of notif_billing
     */ 
    public function getNotif_billing()
    {
        return $this->notif_billing;
    }

    /**
     * Set the value of notif_billing
     *
     * @return  self
     */ 
    public function setNotif_billing($notif_billing)
    {
        $this->notif_billing = $notif_billing;

        return $this;
    }

    /**
     * Get the value of billing_email
     */ 
    public function getBillingEmail()
    {
        return $this->billing_email;
    }

    /**
     * Set the value of billing_email
     *
     * @return  self
     */ 
    public function setBillingEmail($billing_email)
    {
        $this->billing_email = $billing_email;

        return $this;
    }

    /**
     * Get the value of confirmed
     */ 
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Set the value of confirmed
     *
     * @return  self
     */ 
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    /**
     * Get the value of cgu
     */ 
    public function getCgu()
    {
        return $this->cgu;
    }

    /**
     * Set the value of cgu
     *
     * @return  self
     */ 
    public function setCgu($cgu)
    {
        $this->cgu = $cgu;

        return $this;
    }

    /**
     * Get the value of notify_ev
     */ 
    public function getNotifyEv()
    {
        return $this->notify_ev;
    }

    /**
     * Set the value of notify_ev
     *
     * @return  self
     */ 
    public function setNotifyEv($notify_ev)
    {
        $this->notify_ev = $notify_ev;

        return $this;
    }

    /**
     * Get the value of notify_ar
     */ 
    public function getNotifyAr()
    {
        return $this->notify_ar;
    }

    /**
     * Set the value of notify_ar
     *
     * @return  self
     */ 
    public function setNotifyAr($notify_ar)
    {
        $this->notify_ar = $notify_ar;

        return $this;
    }

    /**
     * Get the value of notify_rf
     */ 
    public function getNotifyRf()
    {
        return $this->notify_rf;
    }

    /**
     * Set the value of notify_rf
     *
     * @return  self
     */ 
    public function setNotifyRf($notify_rf)
    {
        $this->notify_rf = $notify_rf;

        return $this;
    }

    /**
     * Get the value of notify_ng
     */ 
    public function getNotifyNg()
    {
        return $this->notify_ng;
    }

    /**
     * Set the value of notify_ng
     *
     * @return  self
     */ 
    public function setNotifyNg($notify_ng)
    {
        $this->notify_ng = $notify_ng;

        return $this;
    }

    /**
     * Get the value of notify_consent
     */ 
    public function getNotifyConsent()
    {
        return $this->notify_consent;
    }

    /**
     * Set the value of notify_consent
     *
     * @return  self
     */ 
    public function setNotifyConsent($notify_consent)
    {
        $this->notify_consent = $notify_consent;

        return $this;
    }

    /**
     * Get the value of notify_eidas_to_valid
     */ 
    public function getNotifyEidasToValid()
    {
        return $this->notify_eidas_to_valid;
    }

    /**
     * Set the value of notify_eidas_to_valid
     *
     * @return  self
     */ 
    public function setNotifyEidasToValid($notify_eidas_to_valid)
    {
        $this->notify_eidas_to_valid = $notify_eidas_to_valid;

        return $this;
    }

    /**
     * Get the value of notify_recipient_update
     */ 
    public function getNotifyRecipientUpdate()
    {
        return $this->notify_recipient_update;
    }

    /**
     * Set the value of notify_recipient_update
     *
     * @return  self
     */ 
    public function setNotifyRecipientUpdate($notify_recipient_update)
    {
        $this->notify_recipient_update = $notify_recipient_update;

        return $this;
    }

    /**
     * Get the value of notify_waiting_ar_answer
     */ 
    public function getNotifyWaitingArAnswer()
    {
        return $this->notify_waiting_ar_answer;
    }

    /**
     * Set the value of notify_waiting_ar_answer
     *
     * @return  self
     */ 
    public function setNotifyWaitingArAnswer($notify_waiting_ar_answer)
    {
        $this->notify_waiting_ar_answer = $notify_waiting_ar_answer;

        return $this;
    }

    /**
     * Get the value of is_legal_entity
     */ 
    public function getIsLegalEntity()
    {
        return $this->is_legal_entity;
    }

    /**
     * Set the value of is_legal_entity
     *
     * @return  self
     */ 
    public function setIsLegalEntity($is_legal_entity)
    {
        $this->is_legal_entity = $is_legal_entity;

        return $this;
    }


}