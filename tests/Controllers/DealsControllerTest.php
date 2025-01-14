<?php
/*
 * Pipedrive
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace Pipedrive\Tests;

use Pipedrive\APIException;
use Pipedrive\Exceptions;
use Pipedrive\APIHelper;
use Pipedrive\Models;
use Pipedrive\Utils\DateTimeHelper;

class DealsControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Pipedrive\Controllers\DealsController Controller instance
     */
    protected static $controller;

    /**
     * @var HttpCallBackCatcher Callback
     */
    protected $httpResponse;

    /**
     * Setup test class
     */
    public static function setUpBeforeClass()
    {
        $client = new \Pipedrive\Client();
        self::$controller = $client->getDeals();
    }

    /**
     * Setup test
     */
    protected function setUp()
    {
        $this->httpResponse = new HttpCallBackCatcher();
    }

    /**
     * Returns all deals. For more information on how to get all deals, see <a href="https://pipedrive.readme.io/docs/getting-all-deals" target="_blank" rel="noopener noreferrer">this tutorial</a>.
     */
    public function testTestGetAllDeals()
    {
        // Parameters for the API call
        $input = array();
        $input['userId'] = null;
        $input['filterId'] = null;
        $input['stageId'] = null;
        $input['status'] = TestHelper::getJsonMapper()->mapClass(json_decode(
            'all_not_deleted'),
            'Pipedrive\\Models\\string'
        );
        $input['start'] = 0;
        $input['limit'] = null;
        $input['sort'] = null;
        $input['ownedByYou'] = null;

        // Set callback and perform API call
        $result = null;
        self::$controller->setHttpCallBack($this->httpResponse);
        try {
            $result = self::$controller->getAllDeals($input);
        } catch (APIException $e) {
        }

        // Test response code
        $this->assertEquals(
            200,
            $this->httpResponse->getResponse()->getStatusCode(),
            "Status is not 200"
        );

        // Test headers
        $headers = [];
        $headers['Content-Type'] = 'application/json' ;

        $this->assertTrue(
            TestHelper::areHeadersProperSubsetOf($headers, $this->httpResponse->getResponse()->getHeaders(), true),
            "Headers do not match"
        );

        // Test whether the captured response is as we expected
        $this->assertNotNull($result, "Result does not exist");

        $this->assertTrue(
            TestHelper::isJsonObjectProperSubsetOf(
                "{\"success\":true,\"data\":[{\"id\":1,\"creator_user_id\":{\"id\":9258618,\"name\":\"Creator\",\"ema" .
                "il\":\"creator@pipedrive.com\",\"has_pic\":false,\"pic_hash\":\"null\",\"active_flag\":true,\"value" .
                "\":9258618},\"user_id\":{\"id\":9258618,\"name\":\"Creator\",\"email\":\"creator@pipedrive.com\",\"h" .
                "as_pic\":false,\"pic_hash\":\"null\",\"active_flag\":true,\"value\":9258618},\"person_id\":{\"active" .
                "_flag\":true,\"name\":\"Person\",\"email\":[{\"label\":\"work\",\"value\":\"person@pipedrive.com\"," .
                "\"primary\":true}],\"phone\":[{\"label\":\"work\",\"value\":\"37244499911\",\"primary\":true}],\"val" .
                "ue\":1101},\"org_id\":{\"name\":\"Organization\",\"people_count\":2,\"owner_id\":9258618,\"address\"" .
                ":\"Mustamäe tee 3a, 10615 Tallinn\",\"active_flag\":true,\"cc_email\":\"org@pipedrivemail.com\",\"va" .
                "lue\":5},\"stage_id\":2,\"title\":\"Deal One\",\"value\":5000,\"currency\":\"EUR\",\"add_time\":\"20" .
                "19-05-29 04:21:51\",\"update_time\":\"2019-11-28 16:19:50\",\"stage_change_time\":\"2019-11-28 15:41" .
                ":22\",\"active\":true,\"deleted\":false,\"status\":\"open\",\"probability\":null,\"next_activity_dat" .
                "e\":\"2019-11-29\",\"next_activity_time\":\"11:30:00\",\"next_activity_id\":128,\"last_activity_id\"" .
                ":null,\"last_activity_date\":\"null\",\"lost_reason\":\"null\",\"visible_to\":\"1\",\"close_time\":" .
                "\"null\",\"pipeline_id\":1,\"won_time\":\"2019-11-27 11:40:36\",\"first_won_time\":\"2019-11-27 11:4" .
                "0:36\",\"lost_time\":\"null\",\"products_count\":0,\"files_count\":0,\"notes_count\":2,\"followers_c" .
                "ount\":0,\"email_messages_count\":4,\"activities_count\":1,\"done_activities_count\":0,\"undone_acti" .
                "vities_count\":1,\"reference_activities_count\":0,\"participants_count\":1,\"expected_close_date\":" .
                "\"2019-06-29\",\"last_incoming_mail_time\":\"2019-05-29 18:21:42\",\"last_outgoing_mail_time\":\"201" .
                "9-05-30 03:45:35\",\"label\":\"null\",\"stage_order_nr\":2,\"person_name\":\"Person\",\"org_name\":" .
                "\"Organization\",\"next_activity_subject\":\"Call\",\"next_activity_type\":\"call\",\"next_activity_" .
                "duration\":\"00:30:00\",\"next_activity_note\":\"Note content\",\"formatted_value\":\"€5,000\",\"wei" .
                "ghted_value\":5000,\"formatted_weighted_value\":\"€5,000\",\"weighted_value_currency\":\"EUR\",\"rot" .
                "ten_time\":\"null\",\"owner_name\":\"Creator\",\"cc_email\":\"company+deal1@pipedrivemail.com\",\"or" .
                "g_hidden\":false,\"person_hidden\":false}],\"related_objects\":{\"user\":{\"9258618\":{\"id\":925861" .
                "8,\"name\":\"Creator\",\"email\":\"creator@pipedrive.com\",\"has_pic\":false,\"pic_hash\":null,\"act" .
                "ive_flag\":true}},\"organization\":{\"5\":{\"id\":5,\"name\":\"Organization\",\"people_count\":2,\"o" .
                "wner_id\":9258618,\"address\":\"Mustamäe tee 3a, 10615 Tallinn\",\"active_flag\":true,\"cc_email\":" .
                "\"org@pipedrivemail.com\"}},\"person\":{\"1101\":{\"active_flag\":true,\"id\":1101,\"name\":\"Person" .
                "\",\"email\":[{\"label\":\"work\",\"value\":\"person@pipedrive.com\",\"primary\":true}],\"phone\":[{" .
                "\"label\":\"work\",\"value\":\"3421787767\",\"primary\":true}]}}},\"additional_data\":{\"pagination" .
                "\":{\"start\":0,\"limit\":100,\"more_items_in_collection\":false,\"next_start\":1}}}",
                $this->httpResponse->getResponse()->getRawBody(),
                false,
                true,
                false
            ),
            "Response body does not match in keys"
        );
    }

    /**
     * Adds a new deal. Note that you can supply additional custom fields along with the request that are not described here. These custom fields are different for each Pipedrive account and can be recognized by long hashes as keys. To determine which custom fields exists, fetch the dealFields and look for 'key' values. For more information on how to add a deal, see <a href="https://pipedrive.readme.io/docs/creating-a-deal" target="_blank" rel="noopener noreferrer">this tutorial</a>.
     */
    public function testTestAddADeal()
    {
        // Parameters for the API call
        $body = null;

        // Set callback and perform API call
        $result = null;
        self::$controller->setHttpCallBack($this->httpResponse);
        try {
            $result = self::$controller->addADeal($body);
        } catch (APIException $e) {
        }

        // Test response code
        $this->assertEquals(
            200,
            $this->httpResponse->getResponse()->getStatusCode(),
            "Status is not 200"
        );

        // Test headers
        $headers = [];
        $headers['Content-Type'] = 'application/json' ;

        $this->assertTrue(
            TestHelper::areHeadersProperSubsetOf($headers, $this->httpResponse->getResponse()->getHeaders(), true),
            "Headers do not match"
        );

        // Test whether the captured response is as we expected
        $this->assertNotNull($result, "Result does not exist");

        $this->assertTrue(
            TestHelper::isJsonObjectProperSubsetOf(
                "{\"success\":true,\"data\":{\"id\":1,\"creator_user_id\":{\"id\":9258618,\"name\":\"Creator\",\"emai" .
                "l\":\"creator@pipedrive.com\",\"has_pic\":false,\"pic_hash\":\"null\",\"active_flag\":true,\"value\"" .
                ":9258618},\"user_id\":{\"id\":9258618,\"name\":\"Creator\",\"email\":\"creator@pipedrive.com\",\"has" .
                "_pic\":false,\"pic_hash\":\"null\",\"active_flag\":true,\"value\":9258618},\"person_id\":{\"active_f" .
                "lag\":true,\"name\":\"Person\",\"email\":[{\"label\":\"work\",\"value\":\"person@pipedrive.com\",\"p" .
                "rimary\":true}],\"phone\":[{\"label\":\"work\",\"value\":\"37244499911\",\"primary\":true}],\"value" .
                "\":1101},\"org_id\":{\"name\":\"Organization\",\"people_count\":2,\"owner_id\":9258618,\"address\":" .
                "\"null\",\"active_flag\":true,\"cc_email\":\"org@pipedrivemail.com\",\"value\":5},\"stage_id\":2,\"t" .
                "itle\":\"Deal One\",\"value\":5000,\"currency\":\"EUR\",\"add_time\":\"2019-05-29 04:21:51\",\"updat" .
                "e_time\":\"2019-11-28 16:19:50\",\"stage_change_time\":\"2019-11-28 15:41:22\",\"active\":true,\"del" .
                "eted\":false,\"status\":\"open\",\"probability\":null,\"next_activity_date\":\"2019-11-29\",\"next_a" .
                "ctivity_time\":\"11:30:00\",\"next_activity_id\":128,\"last_activity_id\":null,\"last_activity_date" .
                "\":\"null\",\"lost_reason\":\"null\",\"visible_to\":\"1\",\"close_time\":\"null\",\"pipeline_id\":1," .
                "\"won_time\":\"2019-11-27 11:40:36\",\"first_won_time\":\"2019-11-27 11:40:36\",\"lost_time\":\"null" .
                "\",\"products_count\":0,\"files_count\":0,\"notes_count\":2,\"followers_count\":0,\"email_messages_c" .
                "ount\":4,\"activities_count\":1,\"done_activities_count\":0,\"undone_activities_count\":1,\"referenc" .
                "e_activities_count\":0,\"participants_count\":1,\"expected_close_date\":\"2019-06-29\",\"last_incomi" .
                "ng_mail_time\":\"2019-05-29 18:21:42\",\"last_outgoing_mail_time\":\"2019-05-30 03:45:35\",\"label\"" .
                ":\"null\",\"stage_order_nr\":2,\"person_name\":\"Person\",\"org_name\":\"Organization\",\"next_activ" .
                "ity_subject\":\"Call\",\"next_activity_type\":\"call\",\"next_activity_duration\":\"00:30:00\",\"nex" .
                "t_activity_note\":\"Note content\",\"formatted_value\":\"€5,000\",\"weighted_value\":5000,\"formatte" .
                "d_weighted_value\":\"€5,000\",\"weighted_value_currency\":\"EUR\",\"rotten_time\":\"null\",\"owner_n" .
                "ame\":\"Creator\",\"cc_email\":\"company+deal1@pipedrivemail.com\",\"org_hidden\":false,\"person_hid" .
                "den\":false},\"additional_data\":{\"matches_filters\":[1]},\"related_objects\":{\"user\":{\"9258618" .
                "\":{\"id\":9258618,\"name\":\"Creator\",\"email\":\"creator@pipedrive.com\",\"has_pic\":false,\"pic_" .
                "hash\":null,\"active_flag\":true}},\"organization\":{\"2\":{\"id\":2,\"name\":\"Organization\",\"peo" .
                "ple_count\":2,\"owner_id\":9258618,\"address\":\"Mustamäe tee 3a, 10615 Tallinn\",\"active_flag\":tr" .
                "ue,\"cc_email\":\"org@pipedrivemail.com\"}},\"person\":{\"1101\":{\"active_flag\":true,\"id\":1101," .
                "\"name\":\"Person\",\"email\":[{\"label\":\"work\",\"value\":\"person@pipedrive.com\",\"primary\":tr" .
                "ue}],\"phone\":[{\"label\":\"work\",\"value\":\"3421787767\",\"primary\":true}]}}}}",
                $this->httpResponse->getResponse()->getRawBody(),
                false,
                true,
                false
            ),
            "Response body does not match in keys"
        );
    }

    /**
     * Returns summary of all the deals.
     */
    public function testTestGetDealsSummary()
    {
        // Parameters for the API call
        $input = array();
        $input['status'] = null;
        $input['filterId'] = null;
        $input['userId'] = null;
        $input['stageId'] = null;
        $input['pipelineId'] = null;

        // Set callback and perform API call
        $result = null;
        self::$controller->setHttpCallBack($this->httpResponse);
        try {
            $result = self::$controller->getDealsSummary($input);
        } catch (APIException $e) {
        }

        // Test response code
        $this->assertEquals(
            200,
            $this->httpResponse->getResponse()->getStatusCode(),
            "Status is not 200"
        );

        // Test headers
        $headers = [];
        $headers['Content-Type'] = 'application/json' ;

        $this->assertTrue(
            TestHelper::areHeadersProperSubsetOf($headers, $this->httpResponse->getResponse()->getHeaders(), true),
            "Headers do not match"
        );

        // Test whether the captured response is as we expected
        $this->assertNotNull($result, "Result does not exist");

        $this->assertTrue(
            TestHelper::isJsonObjectProperSubsetOf(
                "{\"success\":true,\"data\":{\"values_total\":{\"EUR\":{\"value\":10,\"count\":2,\"value_converted\":" .
                "11.1,\"value_formatted\":\"€10\",\"value_converted_formatted\":\"US$11.10\"},\"USD\":{\"value\":30," .
                "\"count\":3,\"value_converted\":30,\"value_formatted\":\"US$30\",\"value_converted_formatted\":\"US$" .
                "3\"}},\"weighted_values_total\":{\"EUR\":{\"value\":10,\"count\":2,\"value_formatted\":\"€10\"},\"US" .
                "D\":{\"value\":30,\"count\":3,\"value_formatted\":\"US$30\"}},\"total_count\":5,\"total_currency_con" .
                "verted_value\":41.1,\"total_weighted_currency_converted_value\":41.1,\"total_currency_converted_valu" .
                "e_formatted\":\"US$41.1\",\"total_weighted_currency_converted_value_formatted\":\"US$41.1\"}}",
                $this->httpResponse->getResponse()->getRawBody(),
                false,
                true,
                false
            ),
            "Response body does not match in keys"
        );
    }
}
