<?php
/*
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
 
/*
 * This file has been modified by Mashery, Inc.
 * 
 * Note that the original work's copyright and license information is located at
 * the top of this file. Any modifications made by Mashery, Inc. are licensed
 * under the following license.
 * 
 * Copyright (c) 2012 Mashery, Inc. 
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:

 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.

 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *  
 * @author Neil Mansilla <neil@mashery.com>
 */

// Check for the required json and curl extensions, the Google API PHP Client won'tfunction without them.
if (! function_exists('curl_init')) {
  throw new Exception('Google PHP API Client requires the CURL PHP extension');
}

if (! function_exists('json_decode')) {
  throw new Exception('Google PHP API Client requires the JSON PHP extension');
}

if (! function_exists('http_build_query')) {
  throw new Exception('Google PHP API Client requires http_build_query()');
}

if (! ini_get('date.timezone') && function_exists('date_default_timezone_set')) {
  date_default_timezone_set('UTC');
}

$cwd = dirname(__FILE__);
set_include_path("$cwd" . PATH_SEPARATOR . get_include_path());

require_once "config.php";
// If a local configuration file is found, merge it's values with the default configuration
if (file_exists($cwd . '/local_config.php')) {
  $defaultConfig = $apiConfig;
  require_once ($cwd . '/local_config.php');
  $apiConfig = array_merge($defaultConfig, $apiConfig);
}

// Include the top level classes, they each include their own dependencies
require_once 'service/apiModel.php';
require_once 'service/apiService.php';
require_once 'service/apiServiceRequest.php';
require_once 'auth/apiAuth.php';
require_once 'cache/apiCache.php';
require_once 'io/apiIO.php';
require_once('service/apiMediaFileUpload.php');

/**
 * The Google API Client
 * http://code.google.com/p/google-api-php-client/
 *
 * @author Chris Chabot <chabotc@google.com>
 * @author Chirag Shah <chirags@google.com>
 */
class apiClient {
  // the version of the discovery mechanism this class is meant to work with
  const discoveryVersion = 'v0.3';

  /**
   * @static
   * @var apiAuth $auth
   */
  static $auth;

  /** @var apiIo $io */
  static $io;

  /** @var apiCache $cache */
  static $cache;

  /** @var array $scopes */
  protected $scopes = array();

  /** @var bool $useObjects */
  protected $useObjects = true;

  // definitions of services that are discovered.
  protected $services = array();

  public function __construct($config = array()) {
    global $apiConfig;
    $apiConfig = array_merge($apiConfig, $config);
    self::$cache = new $apiConfig['cacheClass']();
    self::$auth = new $apiConfig['authClass']();
    self::$io = new $apiConfig['ioClass']();
  }

  /**
   * Add a service
   */
  public function addService($service, $version) {
    global $apiConfig;
    if ($this->authenticated) {
      // Adding services after being authenticated, since the oauth scope is already set (so you wouldn't have access to that data)
      throw new apiException('Cant add services after having authenticated');
    }
    $this->services[$service] = $this->defaultService;
    if (isset($apiConfig['services'][$service])) {
      // Merge the service descriptor with the default values
      $this->services[$service] = array_merge($this->services[$service], $apiConfig['services'][$service]);
    }
  }

  /**
   * Set the type of Auth class the client should use.
   * @param string $authClassName
   */
  public function setAuthClass($authClassName) {
    self::$auth = new $authClassName();
  }

  /**
   * Set the developer key to use
   * @param string $developerKey
   */
  public function setDeveloperKey($developerKey) {
    self::$auth->setDeveloperKey($developerKey);
  }
  
  /**
   * * Set the developer shared secret to use
   * @param string $developersecret
   */
  public function setDeveloperSecret($developerSecret) {
    self::$auth->setDeveloperSecret($developerSecret);
  }
    
  /**
   * Set the application name, this is included in the User-Agent HTTP header.
   * @param string $applicationName
   */
  public function setApplicationName($applicationName) {
    global $apiConfig;
    $apiConfig['application_name'] = $applicationName;
  }

  /**
   * Declare if objects should be returned by the api service classes.
   *
   * @param boolean $useObjects True if objects should be returned by the service classes.
   * False if associative arrays should be returned (default behavior).
   */
  public function setUseObjects($useObjects) {
    global $apiConfig;
    $apiConfig['use_objects'] = $useObjects;
  }

  /**
   * @static
   * @return apiAuth the implementation of apiAuth.
   */
  public static function getAuth() {
    return apiClient::$auth;
  }

  /**
   * @static
   * @return apiIo the implementation of apiIo.
   */
  public static function getIo() {
    return apiClient::$io;
  }

  /**
   * @return apiCache the implementation of apiCache.
   */
  public function getCache() {
    return apiClient::$cache;
  }
}

// Exceptions that the Google PHP API Library can throw
class apiException extends Exception {}
class apiAuthException extends apiException {}
class apiCacheException extends apiException {}
class apiIOException extends apiException {}
class apiServiceException extends apiException {}
