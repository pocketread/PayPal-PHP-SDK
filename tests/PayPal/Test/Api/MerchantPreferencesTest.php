<?php

namespace PayPal\Test\Api;

use PayPal\Api\MerchantPreferences;
use PHPUnit\Framework\TestCase;

/**
 * Class MerchantPreferences
 *
 * @package PayPal\Test\Api
 */
class MerchantPreferencesTest extends TestCase
{
    /**
     * Gets Json String of Object MerchantPreferences
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","setup_fee":' .CurrencyTest::getJson() . ',"cancel_url":"http://www.google.com","return_url":"http://www.google.com","notify_url":"http://www.google.com","max_fail_attempts":"TestSample","auto_bill_amount":"TestSample","initial_fail_amount_action":"TestSample","accepted_payment_type":"TestSample","char_set":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return MerchantPreferences
     */
    public static function getObject()
    {
        return new MerchantPreferences(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return MerchantPreferences
     */
    public function testSerializationDeserialization()
    {
        $obj = new MerchantPreferences(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getSetupFee());
        $this->assertNotNull($obj->getCancelUrl());
        $this->assertNotNull($obj->getReturnUrl());
        $this->assertNotNull($obj->getNotifyUrl());
        $this->assertNotNull($obj->getMaxFailAttempts());
        $this->assertNotNull($obj->getAutoBillAmount());
        $this->assertNotNull($obj->getInitialFailAmountAction());
        $this->assertNotNull($obj->getAcceptedPaymentType());
        $this->assertNotNull($obj->getCharSet());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param MerchantPreferences $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getSetupFee(), CurrencyTest::getObject());
        $this->assertEquals($obj->getCancelUrl(), "http://www.google.com");
        $this->assertEquals($obj->getReturnUrl(), "http://www.google.com");
        $this->assertEquals($obj->getNotifyUrl(), "http://www.google.com");
        $this->assertEquals($obj->getMaxFailAttempts(), "TestSample");
        $this->assertEquals($obj->getAutoBillAmount(), "TestSample");
        $this->assertEquals($obj->getInitialFailAmountAction(), "TestSample");
        $this->assertEquals($obj->getAcceptedPaymentType(), "TestSample");
        $this->assertEquals($obj->getCharSet(), "TestSample");
    }

    public function testUrlValidationForCancelUrl()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("CancelUrl is not a fully qualified URL");
        $obj = new MerchantPreferences();
        $obj->setCancelUrl(null);
    }

    public function testUrlValidationForReturnUrl()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("ReturnUrl is not a fully qualified URL");
        $obj = new MerchantPreferences();
        $obj->setReturnUrl(null);
    }

    public function testUrlValidationForNotifyUrl()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("NotifyUrl is not a fully qualified URL");
        $obj = new MerchantPreferences();
        $obj->setNotifyUrl(null);
    }
}
