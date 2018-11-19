<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 05.11.2017
 * Time: 17:27
 * Based on: https://gist.github.com/henriquemoody/6580488
 */

namespace http;


interface HTTPStatusCode
{
    const HTTP_100_CONTINUE = "100 Continue";
    const HTTP_101_SWITCHING_PROTOCOLS = "101 Switching Protocols";
    const HTTP_102_PROCESSING = "102 Processing"; // WebDAV; RFC 2518
    const HTTP_200_OK = "200 OK";
    const HTTP_201_CREATED = "201 Created";
    const HTTP_202_ACCEPTED = "202 Accepted";
    const HTTP_203_NON_AUTHORITATIVE_INFORMATION = "203 Non_Authoritative Information"; // since HTTP/1.1
    const HTTP_204_NO_CONTENT = "204 No Content";
    const HTTP_205_RESET_CONTENT = "205 Reset Content";
    const HTTP_206_PARTIAL_CONTENT = "206 Partial Content";
    const HTTP_207_MULTI_STATUS = "207 Multi_Status"; // WebDAV; RFC 4918
    const HTTP_208_ALREADY_REPORTED = "208 Already Reported"; // WebDAV; RFC 5842
    const HTTP_226_IM_USED = "226 IM Used"; // RFC 3229
    const HTTP_300_MULTIPLE_CHOICES = "300 Multiple Choices";
    const HTTP_301_MOVED_PERMANENTLY = "301 Moved Permanently";
    const HTTP_302_FOUND = "302 Found";
    const HTTP_303_SEE_OTHER = "303 See Other"; // since HTTP/1.1
    const HTTP_304_NOT_MODIFIED = "304Not Modified";
    const HTTP_305_USE_PROXY = "305 Use Proxy"; // since HTTP/1.1
    const HTTP_306_SWITCH_PROXY = "306 Switch Proxy";
    const HTTP_307_TEMPORARY_REDIRECT = "307 Temporary Redirect"; // since HTTP/1.1
    const HTTP_308_PERMANENT_REDIRECT = "308 Permanent Redirect"; // approved as experimental RFC
    const HTTP_400_BAD_REQUEST = "400 Bad Request";
    const HTTP_401_UNAUTHORIZED = "401 Unauthorized";
    const HTTP_402_PAYMENT_REQUIRED = "402 Payment Required";
    const HTTP_403_FORBIDDEN = "403 Forbidden";
    const HTTP_404_NOT_FOUND = "404 Not Found";
    const HTTP_405_METHOD_NOT_ALLOWED = "405 Method Not Allowed";
    const HTTP_406_NOT_ACCEPTABLE = "406 Not Acceptable";
    const HTTP_407_PROXY_AUTHENTICATION_REQUIRED = "407 Proxy Authentication Required";
    const HTTP_408_REQUEST_TIMEOUT = "408 Request Timeout";
    const HTTP_409_CONFLICT = "409 Conflict";
    const HTTP_410_GONE = "410 Gone";
    const HTTP_411_LENGTH_REQUIRED = "411 Length Required";
    const HTTP_412_PRECONDITION_FAILED = "412 Precondition Failed";
    const HTTP_413_REQUEST_ENTITY_TOO_LARGE = "413 Request Entity Too Large";
    const HTTP_414_REQUEST_URI_TOO_LONG = "414 Request_URI Too Long";
    const HTTP_415_UNSUPPORTED_MEDIA_TYPE = "415 Unsupported Media Type";
    const HTTP_416_REQUESTED_RANGE_NOT_SATISFIABLE = "416 Requested Range Not Satisfiable";
    const HTTP_417_EXPECTATION_FAILED = "417 Expectation Failed";
    const HTTP_418_IM_A_TEAPOT = "418 I\'m a teapot"; // RFC 2324
    const HTTP_419_AUTHENTICATION_TIMEOUT = "419 Authentication Timeout"; // not in RFC 2616
    const HTTP_420_METHOD_FAILURE = "420 Method Failure"; // Spring Framework
    const HTTP_420_ENHANCE_YOUR_CALM = "420 Enhance Your Calm"; // Twitter
    const HTTP_422_UNPROCESSABLE_ENTITY = "422 Unprocessable Entity"; // WebDAV; RFC 4918
    const HTTP_423_LOCKED = "423 Locked"; // WebDAV; RFC 4918
    const HTTP_424_FAILED_DEPENDENCY = "424 Failed Dependency"; // WebDAV; RFC 4918
    const HTTP_424_METHOD_FAILURE = "424 Method Failure"; // WebDAV)
    const HTTP_425_UNORDERED_COLLECTION = "425 Unordered Collection"; // Internet draft
    const HTTP_426_UPGRADE_REQUIRED = "426 Upgrade Required"; // RFC 2817
    const HTTP_428_PRECONDITION_REQUIRED = "428 Precondition Required"; // RFC 6585
    const HTTP_429_TOO_MANY_REQUESTS = "429 Too Many Requests"; // RFC 6585
    const HTTP_431_REQUEST_HEADER_FIELDS_TOO_LARGE = "431 Request Header Fields Too Large"; // RFC 6585
    const HTTP_444_NO_RESPONSE = "444 No Response"; // Nginx
    const HTTP_449_RETRY_WITH = "449 Retry With"; // Microsoft
    const HTTP_450_BLOCKED_BY_WINDOWS_PARENTAL_CONTROLS = "450 Blocked by Windows Parental Controls"; // Microsoft
    const HTTP_451_UNAVAILABLE_FOR_LEGAL_REASONS = "451 Unavailable For Legal Reasons"; // Internet draft
    const HTTP_451_REDIRECT = "451 Redirect"; // Microsoft
    const HTTP_494_REQUEST_HEADER_TOO_LARGE = "494 Request Header Too Large"; // Nginx
    const HTTP_495_CERT_ERROR = "495 Cert Error"; // Nginx
    const HTTP_496_NO_CERT = "496 No Cert"; // Nginx
    const HTTP_497_HTTP_TO_HTTPS = "497 HTTP to HTTPS"; // Nginx
    const HTTP_499_CLIENT_CLOSED_REQUEST = "499 Client Closed Request"; // Nginx
    const HTTP_500_INTERNAL_SERVER_ERROR = "500 Internal Server Error";
    const HTTP_501_NOT_IMPLEMENTED = "501 Not Implemented";
    const HTTP_502_BAD_GATEWAY = "502 Bad Gateway";
    const HTTP_503_SERVICE_UNAVAILABLE = "503 Service Unavailable";
    const HTTP_504_GATEWAY_TIMEOUT = "504 Gateway Timeout";
    const HTTP_505_HTTP_VERSION_NOT_SUPPORTED = "505 HTTP Version Not Supported";
    const HTTP_506_VARIANT_ALSO_NEGOTIATES = "506 Variant Also Negotiates"; // RFC 2295
    const HTTP_507_INSUFFICIENT_STORAGE = "507 Insufficient Storage"; // WebDAV; RFC 4918
    const HTTP_508_LOOP_DETECTED = "508 Loop Detected"; // WebDAV; RFC 5842
    const HTTP_509_BANDWIDTH_LIMIT_EXCEEDED = "509 Bandwidth Limit Exceeded"; // Apache bw/limited extension
    const HTTP_510_NOT_EXTENDED = "510 Not Extended"; // RFC 2774
    const HTTP_511_NETWORK_AUTHENTICATION_REQUIRED = "511 Network Authentication Required"; // RFC 6585
    const HTTP_598_NETWORK_READ_TIMEOUT_ERROR = "598 Network read timeout error"; // Unknown
    const HTTP_599_NETWORK_CONNECT_TIMEOUT_ERROR = "599 Network connect timeout error"; // Unknown
}