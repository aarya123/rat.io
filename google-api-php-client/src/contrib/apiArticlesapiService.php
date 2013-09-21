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
   * The "ArticlesMethods" collection of methods.
   * Typical usage is:
   *  <code>
   *   $articlesapiService = new apiArticlesapiService(...);
   *   $ArticlesMethods = $articlesapiService->ArticlesMethods;
   *  </code>
   */
  class ArticlesMethodsServiceResource extends apiServiceResource {


    /**
     * Community feeds return content from any one of USA TODAY&#39;s blogs in reverse chronological
     * order. (ArticlesMethods.CommunityFeedMethods)
     *
     * @param string $community Use this to request Top News by section. Default is home
     * @param string $encoding Output format as JSON or RSS
     */
    public function CommunityFeedMethods($community, $encoding) {
      $params = array('community' => $community, 'encoding' => $encoding);
      $data = $this->__call('CommunityFeedMethods', array($params));
      return $data;
    }
    /**
     * Use this to request Top News by section. Default is home (ArticlesMethods.TopNews)
     *
     * @param string $encoding Output format as JSON or RSS
     * @param string $section Use this to request Top News by section. Default is home
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string count Use this value to set the number of incoming stories. (default is 10)
     * @opt_param string days Returns stories that are no older than X days old, where X equals the input value.
     * @opt_param string csp Appends the designated CSP value to each hyperlink.
     * @opt_param string page Returns the Xth page of results, where X equals the input value.
     */
    public function TopNews($encoding, $section, $optParams = array()) {
      $params = array('encoding' => $encoding, 'section' => $section);
      $params = array_merge($params, $optParams);
      $data = $this->__call('TopNews', array($params));
      return $data;
    }
  }



/**
 * Service definition for Articlesapi (1.0).
 *
 * <p>
 * 
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class apiArticlesapiService extends apiService {
  public $ArticlesMethods;
  /**
   * Constructs the internal representation of the Articlesapi service.
   *
   * @param apiClient apiClient
   */
  public function __construct(apiClient $apiClient) {
    $this->rpcPath = '/rpc';
    $this->restBasePath = 'open/';
    $this->version = '1.0';
    $this->serviceName = 'articlesapi';
    $this->io = $apiClient->getIo();

    $apiClient->addService($this->serviceName, $this->version);
    $this->ArticlesMethods = new ArticlesMethodsServiceResource($this, $this->serviceName, 'ArticlesMethods', json_decode('{"methods": {"TopNews": {"path": "articles/topnews/{section}", "httpMethod": "GET", "id": "ArticlesMethods.TopNews", "parameters": {"count": {"default": "10", "required": false, "type": "string", "location": "query"}, "encoding": {"required": true, "default": "json", "enum": ["json", ""], "location": "query", "type": "string"}, "section": {"required": true, "default": "home", "enum": ["home", "news", "travel", "money", "sports", "life", "tech", "weather", "test", "nation", "offbeat", "washington", "world", "religion", "opinion", "yl-health", "nfl", "mlb", "nba", "nhl", "collegefootball", "collegebasketball", "highschool", "motorsports", "golf", "soccer", "horseracing", "books", "people", "music", "reviews"], "location": "path", "type": "string"}, "days": {"default": "0", "required": false, "type": "string", "location": "query"}, "page": {"default": "0", "required": false, "type": "string", "location": "query"}, "csp": {"default": "", "required": false, "type": "string", "location": "query"}}}, "CommunityFeedMethods": {"path": "articles/{community}", "httpMethod": "GET", "id": "ArticlesMethods.CommunityFeedMethods", "parameters": {"community": {"required": true, "default": "entertainment", "enum": ["religion", "greenhouse", "kindness", "ondeadline", "onpolitics", "theoval", "thecruiselog", "hotelcheckin", "todayinthesky", "driveon", "campusrivalry", "christinebrennan", "dailypitch", "fantasyjoe", "fantasywindup", "mma", "gameon", "thehuddle", "idolchatter", "entertainment", "livefrom", "pawprintpost", "popcandy", "gamehunters", "sciencefair", "technologylive"], "location": "path", "type": "string"}, "encoding": {"required": true, "default": "json", "enum": ["json", ""], "location": "query", "type": "string"}}}}}', true));
  }
}

class Story extends apiModel {
  public $link;
  public $description;
  public $title;
  public function setLink($link) {
    $this->link = $link;
  }
  public function getLink() {
    return $this->link;
  }
  public function setDescription($description) {
    $this->description = $description;
  }
  public function getDescription() {
    return $this->description;
  }
  public function setTitle($title) {
    $this->title = $title;
  }
  public function getTitle() {
    return $this->title;
  }
}

class StoryList extends apiModel {
  protected $__storiesType = 'Story';
  protected $__storiesDataType = 'array';
  public $stories;
  public function setStories(/* array(Story) */ $stories) {
    $this->assertIsArray($stories, Story, __METHOD__);
    $this->stories = $stories;
  }
  public function getStories() {
    return $this->stories;
  }
}
