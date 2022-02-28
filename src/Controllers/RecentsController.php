<?php
/*
 * Pipedrive
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace Pipedrive\Controllers;

use Pipedrive\APIException;
use Pipedrive\APIHelper;
use Pipedrive\Configuration;
use Pipedrive\Models;
use Pipedrive\Exceptions;
use Pipedrive\Http\HttpRequest;
use Pipedrive\Http\HttpResponse;
use Pipedrive\Http\HttpMethod;
use Pipedrive\Http\HttpContext;
use Pipedrive\OAuthManager;
use Pipedrive\Servers;
use Pipedrive\Utils\CamelCaseHelper;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class RecentsController extends BaseController
{
    /**
     * @var RecentsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return RecentsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Returns data about all recent changes occured after given timestamp.
     *
     * @param  array  $options    Array with all options for search
     * @param string  $options['sinceTimestamp']  Timestamp in UTC. Format: YYYY-MM-DD HH:MM:SS
     * @param string  $options['items']           (optional) Multiple selection of item types to include in query
     *                                            (optional)
     * @param integer $options['start']           (optional) Pagination start
     * @param integer $options['limit']           (optional) Items shown per page
     * @return \Pipedrive\Utils\JsonSerializer response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getRecents(
        $options
    ) {
        //check or get oauth token
        OAuthManager::getInstance()->checkAuthorization();

        //prepare query string for API call
        $_queryBuilder = '/recents';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'since_timestamp' => $this->val($options, 'sinceTimestamp'),
            'items'           => $this->val($options, 'items'),
            'start'           => $this->val($options, 'start', 0),
            'limit'           => $this->val($options, 'limit'),
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthToken->accessToken)
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return CamelCaseHelper::keysToCamelCase($response->body);
    }


    /**
    * Array access utility method
     * @param  array          $arr         Array of values to read from
     * @param  string         $key         Key to get the value from the array
     * @param  mixed|null     $default     Default value to use if the key was not found
     * @return mixed
     */
    private function val($arr, $key, $default = null)
    {
        if (isset($arr[$key])) {
            return is_bool($arr[$key]) ? var_export($arr[$key], true) : $arr[$key];
        }
        return $default;
    }
}
