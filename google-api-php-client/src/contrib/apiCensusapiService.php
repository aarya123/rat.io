<?php
/*
 * Copyright (c) 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

require_once 'service/apiModel.php';
require_once 'service/apiService.php';
require_once 'service/apiServiceRequest.php';


  /**
   * The "CensusResources" collection of methods.
   * Typical usage is:
   *  <code>
   *   $censusapiService = new apiCensusapiService(...);
   *   $CensusResources = $censusapiService->CensusResources;
   *  </code>
   */
  class CensusResourcesServiceResource extends apiServiceResource {


    /**
     * Returns an area&#39;s housing data. Information includes the number of housing units, and the
     * percentage of those that are vacant. (CensusResources.Housing)
     *
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string keyname [placename, FIPS, GNIS]
     * @opt_param string sumlevid 1 = National level, 2 = State level, 3 = County level, 4,6 = City,town level
     * @opt_param string keypat State abbreviation default, or arbitrary placename if keyname=placename
     */
    public function Housing($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('Housing', array($params));
      return $data;
    }
    /**
     * Returns an area&#39;s racial data. Information includes the percentage of an area&#39;s
     * population that identifies as White, Black, American Indian, Asian, native Hawaiian/Pacific
     * Islander, or mixed race. (CensusResources.Race)
     *
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string keyname [placename, FIPS, GNIS]
     * @opt_param string sumlevid 1 = National level, 2 = State level, 3 = County level, 4,6 = City,town level
     * @opt_param string keypat State abbreviation default, or arbitrary placename if keyname=placename
     */
    public function Race($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('Race', array($params));
      return $data;
    }
    /**
     * Returns all available ethnicity, housing, population and race information for specified area.
     * (CensusResources.Locations)
     *
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string keyname [placename, FIPS, GNIS]
     * @opt_param string sumlevid 1 = National level, 2 = State level, 3 = County level, 4,6 = City,town level
     * @opt_param string keypat State abbreviation default, or arbitrary placename if keyname=placename
     */
    public function Locations($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('Locations', array($params));
      return $data;
    }
    /**
     * Returns an area&#39;s ethnic data. Information includes how much of the population identifies as
     * Hispanic or non-Hispanic white, and the USA TODAY Diversity Index. (CensusResources.Ethnicity)
     *
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string keyname [placename, FIPS, GNIS]
     * @opt_param string sumlevid 1 = National level, 2 = State level, 3 = County level, 4,6 = City,town level
     * @opt_param string keypat State abbreviation default, or arbitrary placename if keyname=placename
     */
    public function Ethnicity($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('Ethnicity', array($params));
      return $data;
    }
    /**
     * Returns an area&#39;s population data. Information includes the total population of an area,
     * average population per square mile, and the percent by which that population has changed since
     * the last census. (CensusResources.Population)
     *
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string keyname [placename, FIPS, GNIS]
     * @opt_param string sumlevid 1 = National level, 2 = State level, 3 = County level, 4,6 = City,town level
     * @opt_param string keypat State abbreviation default, or arbitrary placename if keyname=placename
     */
    public function Population($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('Population', array($params));
      return $data;
    }
  }



/**
 * Service definition for Censusapi (1.0).
 *
 * <p>
 * USA TODAY Census API
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class apiCensusapiService extends apiService {
  public $CensusResources;
  /**
   * Constructs the internal representation of the Censusapi service.
   *
   * @param apiClient apiClient
   */
  public function __construct(apiClient $apiClient) {
    $this->rpcPath = '/rpc';
    $this->restBasePath = 'open/';
    $this->version = '1.0';
    $this->serviceName = 'censusapi';
    $this->io = $apiClient->getIo();

    $apiClient->addService($this->serviceName, $this->version);
    $this->CensusResources = new CensusResourcesServiceResource($this, $this->serviceName, 'CensusResources', json_decode('{"methods": {"Housing": {"path": "census/housing", "httpMethod": "GET", "id": "CensusResources.Housing", "parameters": {"keyname": {"default": "", "required": false, "type": "string", "location": "query"}, "sumlevid": {"default": "", "required": false, "type": "string", "location": "query"}, "keypat": {"default": "", "required": false, "type": "string", "location": "query"}}}, "Race": {"path": "census/race", "httpMethod": "GET", "id": "CensusResources.Race", "parameters": {"keyname": {"default": "", "required": false, "type": "string", "location": "query"}, "sumlevid": {"default": "", "required": false, "type": "string", "location": "query"}, "keypat": {"default": "", "required": false, "type": "string", "location": "query"}}}, "Locations": {"path": "census/locations", "httpMethod": "GET", "id": "CensusResources.Locations", "parameters": {"keyname": {"default": "", "required": false, "type": "string", "location": "query"}, "sumlevid": {"default": "", "required": false, "type": "string", "location": "query"}, "keypat": {"default": "", "required": false, "type": "string", "location": "query"}}}, "Ethnicity": {"path": "census/ethnicity", "httpMethod": "GET", "id": "CensusResources.Ethnicity", "parameters": {"keyname": {"default": "", "required": false, "type": "string", "location": "query"}, "sumlevid": {"default": "", "required": false, "type": "string", "location": "query"}, "keypat": {"default": "", "required": false, "type": "string", "location": "query"}}}, "Population": {"path": "census/population", "httpMethod": "GET", "id": "CensusResources.Population", "parameters": {"keyname": {"default": "", "required": false, "type": "string", "location": "query"}, "sumlevid": {"default": "", "required": false, "type": "string", "location": "query"}, "keypat": {"default": "", "required": false, "type": "string", "location": "query"}}}}}', true));
  }
}
