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
   * The "BestSellingBooksMethods" collection of methods.
   * Typical usage is:
   *  <code>
   *   $bestsellingbooksapiService = new apiBestsellingbooksapiService(...);
   *   $BestSellingBooksMethods = $bestsellingbooksapiService->BestSellingBooksMethods;
   *  </code>
   */
  class BestSellingBooksMethodsServiceResource extends apiServiceResource {


    /**
     * Returns the date of each weekly books list for a particular year (published since October 1993,
     * when the books list began) (BestSellingBooksMethods.BestSellingBookListsForParticularYear)
     *
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string encoding Output format as JSON or XML
     * @opt_param string year Year in YYYY format
     * @return BooksByDateResponse
     */
    public function BestSellingBookListsForParticularYear($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('BestSellingBookListsForParticularYear', array($params));
      if ($this->useObjects()) {
        return new BooksByDateResponse($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns the dates of each weekly books list for that particular year and month.
     * (BestSellingBooksMethods.Top150BooksForParticularYearAndMonth)
     *
     * @param string $month Month in M or MM format
     * @param string $year Year in YYYY format
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string count Use this value to set the number of books returned.
     * @opt_param string title Title
     * @opt_param string author Author
     * @opt_param string encoding Output format as JSON or XML
     * @opt_param string class Class
     * @return BooksListResponse
     */
    public function Top150BooksForParticularYearAndMonth($month, $year, $optParams = array()) {
      $params = array('month' => $month, 'year' => $year);
      $params = array_merge($params, $optParams);
      $data = $this->__call('Top150BooksForParticularYearAndMonth', array($params));
      if ($this->useObjects()) {
        return new BooksListResponse($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns the date of each weekly books list published since October 1993, when the books list
     * began (BestSellingBooksMethods.AllBestSellingBookListsPublishedSince1993)
     *
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string minyear Use with maxyear to specify a range
     * @opt_param string maxyear Use with minyear to specify a range
     * @opt_param string encoding Output format as JSON or XML
     * @return BooksByDateResponse
     */
    public function AllBestSellingBookListsPublishedSince1993($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('AllBestSellingBookListsPublishedSince1993', array($params));
      if ($this->useObjects()) {
        return new BooksByDateResponse($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns list of titles that have appeared on the books list.
     * (BestSellingBooksMethods.SearchbyTitle)
     *
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string category Category
     * @opt_param string maxyear Use with minyear to specify a range
     * @opt_param string author Author
     * @opt_param string title Title
     * @opt_param string encoding Output format as JSON or XML
     * @opt_param string year Year in YYYY format
     * @opt_param string minyear Use with maxyear to specify a range
     * @opt_param string class Class
     * @return TitlesResponse
     */
    public function SearchbyTitle($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('SearchbyTitle', array($params));
      if ($this->useObjects()) {
        return new TitlesResponse($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns the dates of each weekly books list for that particular year.
     * (BestSellingBooksMethods.Top150BooksForParticularYear)
     *
     * @param string $year Year in YYYY format
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string category Category
     * @opt_param string count Use this value to set the number of books returned.
     * @opt_param string title Title
     * @opt_param string author Author
     * @opt_param string encoding Output format as JSON or XML
     * @opt_param string class Class
     * @return BooksListResponse
     */
    public function Top150BooksForParticularYear($year, $optParams = array()) {
      $params = array('year' => $year);
      $params = array_merge($params, $optParams);
      $data = $this->__call('Top150BooksForParticularYear', array($params));
      if ($this->useObjects()) {
        return new BooksListResponse($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns a list of available book classes (fiction or non-fiction)
     * (BestSellingBooksMethods.Classes)
     *
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string category Category
     * @opt_param string maxyear Use with minyear to specify a range
     * @opt_param string title Title
     * @opt_param string author Author
     * @opt_param string encoding Output format as JSON or XML
     * @opt_param string year Year in YYYY format
     * @opt_param string minyear Use with maxyear to specify a range
     * @return ClassesResponse
     */
    public function Classes($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('Classes', array($params));
      if ($this->useObjects()) {
        return new ClassesResponse($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns the dates of each weekly books list for that particular year.
     * (BestSellingBooksMethods.Top150BooksForParticularDate)
     *
     * @param string $month Choose a Month
     * @param string $year Year in YYYY format
     * @param string $date Day of month. Must be a Thursday, when booklists are published.
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string count Use this value to set the number of books returned.
     * @opt_param string title Title
     * @opt_param string author Author
     * @opt_param string encoding Output format as JSON or XML
     * @opt_param string class Class
     * @return BooksListResponse
     */
    public function Top150BooksForParticularDate($month, $year, $date, $optParams = array()) {
      $params = array('month' => $month, 'year' => $year, 'date' => $date);
      $params = array_merge($params, $optParams);
      $data = $this->__call('Top150BooksForParticularDate', array($params));
      if ($this->useObjects()) {
        return new BooksListResponse($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns the most recent top 150 books list, including details on each title
     * (BestSellingBooksMethods.Top150BooksMostRecent)
     *
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string category Category
     * @opt_param string count Use this value to set the number of books returned.
     * @opt_param string maxyear Use with minyear to specify a range
     * @opt_param string title Title
     * @opt_param string author Author
     * @opt_param string month Choose a Month
     * @opt_param string encoding Output format as JSON or XML
     * @opt_param string minyear Use with maxyear to specify a range
     * @opt_param string year Year in YYYY format
     * @opt_param string date Choose a Date
     * @opt_param string class Class
     * @return BooksListResponse
     */
    public function Top150BooksMostRecent($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('Top150BooksMostRecent', array($params));
      if ($this->useObjects()) {
        return new BooksListResponse($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns list of titles that have appeared on the books list.
     * (BestSellingBooksMethods.SearchbyISBN)
     *
     * @param string $isbn ISBN of the book. Example: 9781451648539 for Steve Jobs Biography
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string category Category
     * @opt_param string maxyear Use with minyear to specify a range
     * @opt_param string author Author
     * @opt_param string encoding Output format as JSON or XML
     * @opt_param string year Year in YYYY format
     * @opt_param string minyear Use with maxyear to specify a range
     * @opt_param string class Class
     * @return IsbnResponse
     */
    public function SearchbyISBN($isbn, $optParams = array()) {
      $params = array('isbn' => $isbn);
      $params = array_merge($params, $optParams);
      $data = $this->__call('SearchbyISBN', array($params));
      if ($this->useObjects()) {
        return new IsbnResponse($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns the date of each weekly books list for a particular year and month (published since
     * October 1993, when the books list began)
     * (BestSellingBooksMethods.BestSellingBookListsForParticularYearAndMonth)
     *
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string encoding Output format as JSON or XML
     * @opt_param string month Month in M or MM format
     * @opt_param string year Year in YYYY format
     * @return BooksListResponse
     */
    public function BestSellingBookListsForParticularYearAndMonth($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('BestSellingBookListsForParticularYearAndMonth', array($params));
      if ($this->useObjects()) {
        return new BooksListResponse($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns a list of categories used to classify books. (BestSellingBooksMethods.Categories)
     *
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string maxyear Use with minyear to specify a range
     * @opt_param string title Title
     * @opt_param string author Author
     * @opt_param string encoding Output format as JSON or XML
     * @opt_param string year Year in YYYY format
     * @opt_param string minyear Use with maxyear to specify a range
     * @opt_param string class Class
     * @return CategoriesResponse
     */
    public function Categories($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('Categories', array($params));
      if ($this->useObjects()) {
        return new CategoriesResponse($data);
      } else {
        return $data;
      }
    }
  }



/**
 * Service definition for Bestsellingbooksapi (1.0).
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
class apiBestsellingbooksapiService extends apiService {
  public $BestSellingBooksMethods;
  /**
   * Constructs the internal representation of the Bestsellingbooksapi service.
   *
   * @param apiClient apiClient
   */
  public function __construct(apiClient $apiClient) {
    $this->rpcPath = '/rpc';
    $this->restBasePath = '/open';
    $this->version = '1.0';
    $this->serviceName = 'bestsellingbooksapi';
    $this->io = $apiClient->getIo();

    $apiClient->addService($this->serviceName, $this->version);
    $this->BestSellingBooksMethods = new BestSellingBooksMethodsServiceResource($this, $this->serviceName, 'BestSellingBooksMethods', json_decode('{"methods": {"BestSellingBookListsForParticularYear": {"parameters": {"year": {"default": "2011", "required": false, "type": "string", "location": "path"}, "encoding": {"required": false, "default": "json", "enum": ["json", "xml"], "location": "query", "type": "string"}}, "response": {"$ref": "booksByDateResponse"}, "httpMethod": "GET", "path": "bestsellers/books/dates/{year}", "id": "BestSellingBooksMethods.BestSellingBookListsForParticularYear"}, "Top150BooksForParticularYearAndMonth": {"parameters": {"count": {"default": "", "required": false, "type": "string", "location": "query"}, "author": {"default": "", "required": false, "type": "string", "location": "query"}, "encoding": {"required": false, "default": "json", "enum": ["json", "xml"], "location": "query", "type": "string"}, "month": {"default": "8", "required": true, "type": "string", "location": "path"}, "year": {"default": "2011", "required": true, "type": "string", "location": "path"}, "title": {"default": "", "required": false, "type": "string", "location": "query"}, "class": {"default": "", "required": false, "type": "string", "location": "query"}}, "response": {"$ref": "booksListResponse"}, "httpMethod": "GET", "path": "bestsellers/books/booklists/{year}/{month}", "id": "BestSellingBooksMethods.Top150BooksForParticularYearAndMonth"}, "AllBestSellingBookListsPublishedSince1993": {"parameters": {"minyear": {"default": "", "required": false, "type": "string", "location": "query"}, "maxyear": {"default": "", "required": false, "type": "string", "location": "query"}, "encoding": {"required": false, "default": "json", "enum": ["json", "xml"], "location": "query", "type": "string"}}, "response": {"$ref": "booksByDateResponse"}, "httpMethod": "GET", "path": "bestsellers/books/dates", "id": "BestSellingBooksMethods.AllBestSellingBookListsPublishedSince1993"}, "SearchbyTitle": {"parameters": {"category": {"default": "", "required": false, "type": "string", "location": "query"}, "author": {"default": "", "required": false, "type": "string", "location": "query"}, "maxyear": {"default": "", "required": false, "type": "string", "location": "query"}, "title": {"default": "Steve Jobs", "required": false, "type": "string", "location": "query"}, "encoding": {"required": false, "default": "json", "enum": ["json", "xml"], "location": "query", "type": "string"}, "year": {"default": "", "required": false, "type": "string", "location": "query"}, "minyear": {"default": "", "required": false, "type": "string", "location": "query"}, "class": {"default": "", "required": false, "type": "string", "location": "query"}}, "response": {"$ref": "titlesResponse"}, "httpMethod": "GET", "path": "bestsellers/books/titles/", "id": "BestSellingBooksMethods.SearchbyTitle"}, "Top150BooksForParticularYear": {"parameters": {"category": {"default": "", "required": false, "type": "string", "location": "query"}, "count": {"default": "", "required": false, "type": "string", "location": "query"}, "author": {"default": "", "required": false, "type": "string", "location": "query"}, "encoding": {"required": false, "default": "json", "enum": ["json", "xml"], "location": "query", "type": "string"}, "year": {"default": "2011", "required": true, "type": "string", "location": "path"}, "title": {"default": "", "required": false, "type": "string", "location": "query"}, "class": {"default": "", "required": false, "type": "string", "location": "query"}}, "response": {"$ref": "booksListResponse"}, "httpMethod": "GET", "path": "bestsellers/books/booklists/{year}", "id": "BestSellingBooksMethods.Top150BooksForParticularYear"}, "Classes": {"parameters": {"category": {"default": "", "required": false, "type": "string", "location": "query"}, "maxyear": {"default": "", "required": false, "type": "string", "location": "query"}, "author": {"default": "", "required": false, "type": "string", "location": "query"}, "encoding": {"required": false, "default": "json", "enum": ["json", "xml"], "location": "query", "type": "string"}, "year": {"default": "", "required": false, "type": "string", "location": "query"}, "minyear": {"default": "", "required": false, "type": "string", "location": "query"}, "title": {"default": "", "required": false, "type": "string", "location": "query"}}, "response": {"$ref": "classesResponse"}, "httpMethod": "GET", "path": "bestsellers/books/classes", "id": "BestSellingBooksMethods.Classes"}, "Top150BooksForParticularDate": {"parameters": {"count": {"default": "", "required": false, "type": "string", "location": "query"}, "author": {"default": "", "required": false, "type": "string", "location": "query"}, "encoding": {"required": false, "default": "json", "enum": ["json", "xml"], "location": "query", "type": "string"}, "month": {"default": "8", "required": true, "type": "string", "location": "path"}, "year": {"default": "2011", "required": true, "type": "string", "location": "path"}, "date": {"default": "4", "required": true, "type": "string", "location": "path"}, "title": {"default": "", "required": false, "type": "string", "location": "query"}, "class": {"default": "", "required": false, "type": "string", "location": "query"}}, "response": {"$ref": "booksListResponse"}, "httpMethod": "GET", "path": "bestsellers/books/booklists/{year}/{month}/{date}", "id": "BestSellingBooksMethods.Top150BooksForParticularDate"}, "Top150BooksMostRecent": {"parameters": {"category": {"default": "", "required": false, "type": "string", "location": "query"}, "count": {"default": "", "required": false, "type": "string", "location": "query"}, "maxyear": {"default": "", "required": false, "type": "string", "location": "query"}, "author": {"default": "", "required": false, "type": "string", "location": "query"}, "title": {"default": "", "required": false, "type": "string", "location": "query"}, "month": {"default": "", "required": false, "type": "string", "location": "query"}, "encoding": {"required": false, "default": "json", "enum": ["json", "xml"], "location": "query", "type": "string"}, "date": {"default": "", "required": false, "type": "string", "location": "query"}, "year": {"default": "", "required": false, "type": "string", "location": "query"}, "minyear": {"default": "", "required": false, "type": "string", "location": "query"}, "class": {"default": "", "required": false, "type": "string", "location": "query"}}, "response": {"$ref": "booksListResponse"}, "httpMethod": "GET", "path": "bestsellers/books/booklists", "id": "BestSellingBooksMethods.Top150BooksMostRecent"}, "SearchbyISBN": {"parameters": {"category": {"default": "", "required": false, "type": "string", "location": "query"}, "isbn": {"default": "9781451648539", "required": true, "type": "string", "location": "path"}, "maxyear": {"default": "", "required": false, "type": "string", "location": "query"}, "encoding": {"required": false, "default": "json", "enum": ["json", "xml"], "location": "query", "type": "string"}, "author": {"default": "", "required": false, "type": "string", "location": "query"}, "year": {"default": "", "required": false, "type": "string", "location": "query"}, "minyear": {"default": "", "required": false, "type": "string", "location": "query"}, "class": {"default": "", "required": false, "type": "string", "location": "query"}}, "response": {"$ref": "isbnResponse"}, "httpMethod": "GET", "path": "bestsellers/books/titles/{isbn}", "id": "BestSellingBooksMethods.SearchbyISBN"}, "BestSellingBookListsForParticularYearAndMonth": {"parameters": {"month": {"default": "8", "required": false, "type": "string", "location": "path"}, "year": {"default": "2011", "required": false, "type": "string", "location": "path"}, "encoding": {"required": false, "default": "json", "enum": ["json", "xml"], "location": "query", "type": "string"}}, "response": {"$ref": "booksListResponse"}, "httpMethod": "GET", "path": "bestsellers/books/{year}/{month}", "id": "BestSellingBooksMethods.BestSellingBookListsForParticularYearAndMonth"}, "Categories": {"parameters": {"maxyear": {"default": "", "required": false, "type": "string", "location": "query"}, "encoding": {"required": false, "default": "json", "enum": ["json", "xml"], "location": "query", "type": "string"}, "author": {"default": "", "required": false, "type": "string", "location": "query"}, "year": {"default": "", "required": false, "type": "string", "location": "query"}, "minyear": {"default": "", "required": false, "type": "string", "location": "query"}, "title": {"default": "", "required": false, "type": "string", "location": "query"}, "class": {"default": "", "required": false, "type": "string", "location": "query"}}, "response": {"$ref": "categoriesResponse"}, "httpMethod": "GET", "path": "bestsellers/books/categories", "id": "BestSellingBooksMethods.Categories"}}}', true));
  }
}

class ApiParameters extends apiModel {
  public $Category;
  public $Count;
  public $ExcludeCurrentWeek;
  public $ISBN;
  public $MaxYear;
  public $Title;
  public $Author;
  public $Month;
  public $MinYear;
  public $Year;
  public $Date;
  public $Class;
  public $RecentWeekAllowance;
  public function setCategory($Category) {
    $this->Category = $Category;
  }
  public function getCategory() {
    return $this->Category;
  }
  public function setCount($Count) {
    $this->Count = $Count;
  }
  public function getCount() {
    return $this->Count;
  }
  public function setExcludeCurrentWeek($ExcludeCurrentWeek) {
    $this->ExcludeCurrentWeek = $ExcludeCurrentWeek;
  }
  public function getExcludeCurrentWeek() {
    return $this->ExcludeCurrentWeek;
  }
  public function setISBN($ISBN) {
    $this->ISBN = $ISBN;
  }
  public function getISBN() {
    return $this->ISBN;
  }
  public function setMaxYear($MaxYear) {
    $this->MaxYear = $MaxYear;
  }
  public function getMaxYear() {
    return $this->MaxYear;
  }
  public function setTitle($Title) {
    $this->Title = $Title;
  }
  public function getTitle() {
    return $this->Title;
  }
  public function setAuthor($Author) {
    $this->Author = $Author;
  }
  public function getAuthor() {
    return $this->Author;
  }
  public function setMonth($Month) {
    $this->Month = $Month;
  }
  public function getMonth() {
    return $this->Month;
  }
  public function setMinYear($MinYear) {
    $this->MinYear = $MinYear;
  }
  public function getMinYear() {
    return $this->MinYear;
  }
  public function setYear($Year) {
    $this->Year = $Year;
  }
  public function getYear() {
    return $this->Year;
  }
  public function setDate($Date) {
    $this->Date = $Date;
  }
  public function getDate() {
    return $this->Date;
  }
  public function setClass($Class) {
    $this->Class = $Class;
  }
  public function getClass() {
    return $this->Class;
  }
  public function setRecentWeekAllowance($RecentWeekAllowance) {
    $this->RecentWeekAllowance = $RecentWeekAllowance;
  }
  public function getRecentWeekAllowance() {
    return $this->RecentWeekAllowance;
  }
}

class BookList extends apiModel {
  protected $__BookListEntriesType = 'BookListEntry';
  protected $__BookListEntriesDataType = '';
  public $BookListEntries;
  protected $__BookListDateType = 'BookListByDate';
  protected $__BookListDateDataType = '';
  public $BookListDate;
  public $Name;
  public function setBookListEntries(BookListEntry $BookListEntries) {
    $this->BookListEntries = $BookListEntries;
  }
  public function getBookListEntries() {
    return $this->BookListEntries;
  }
  public function setBookListDate(BookListByDate $BookListDate) {
    $this->BookListDate = $BookListDate;
  }
  public function getBookListDate() {
    return $this->BookListDate;
  }
  public function setName($Name) {
    $this->Name = $Name;
  }
  public function getName() {
    return $this->Name;
  }
}

class BookListByDate extends apiModel {
  public $Date;
  public $BookListAPIUrl;
  public $Month;
  public $Year;
  public function setDate($Date) {
    $this->Date = $Date;
  }
  public function getDate() {
    return $this->Date;
  }
  public function setBookListAPIUrl($BookListAPIUrl) {
    $this->BookListAPIUrl = $BookListAPIUrl;
  }
  public function getBookListAPIUrl() {
    return $this->BookListAPIUrl;
  }
  public function setMonth($Month) {
    $this->Month = $Month;
  }
  public function getMonth() {
    return $this->Month;
  }
  public function setYear($Year) {
    $this->Year = $Year;
  }
  public function getYear() {
    return $this->Year;
  }
}

class BookListEntry extends apiModel {
  protected $__CategoryType = 'Category';
  protected $__CategoryDataType = '';
  public $Category;
  public $ASIN;
  public $ISBN;
  protected $__FormatType = 'Format';
  protected $__FormatDataType = '';
  public $Format;
  public $RankLastWeek;
  public $Author;
  public $Title;
  public $Rank;
  public $TitleAPIUrl;
  public $BriefDescription;
  public $Class;
  public function setCategory(Category $Category) {
    $this->Category = $Category;
  }
  public function getCategory() {
    return $this->Category;
  }
  public function setASIN($ASIN) {
    $this->ASIN = $ASIN;
  }
  public function getASIN() {
    return $this->ASIN;
  }
  public function setISBN($ISBN) {
    $this->ISBN = $ISBN;
  }
  public function getISBN() {
    return $this->ISBN;
  }
  public function setFormat(Format $Format) {
    $this->Format = $Format;
  }
  public function getFormat() {
    return $this->Format;
  }
  public function setRankLastWeek($RankLastWeek) {
    $this->RankLastWeek = $RankLastWeek;
  }
  public function getRankLastWeek() {
    return $this->RankLastWeek;
  }
  public function setAuthor($Author) {
    $this->Author = $Author;
  }
  public function getAuthor() {
    return $this->Author;
  }
  public function setTitle($Title) {
    $this->Title = $Title;
  }
  public function getTitle() {
    return $this->Title;
  }
  public function setRank($Rank) {
    $this->Rank = $Rank;
  }
  public function getRank() {
    return $this->Rank;
  }
  public function setTitleAPIUrl($TitleAPIUrl) {
    $this->TitleAPIUrl = $TitleAPIUrl;
  }
  public function getTitleAPIUrl() {
    return $this->TitleAPIUrl;
  }
  public function setBriefDescription($BriefDescription) {
    $this->BriefDescription = $BriefDescription;
  }
  public function getBriefDescription() {
    return $this->BriefDescription;
  }
  public function setClass($Class) {
    $this->Class = $Class;
  }
  public function getClass() {
    return $this->Class;
  }
}

class BooksByDateResponse extends apiModel {
  protected $__APIParametersType = 'ApiParameters';
  protected $__APIParametersDataType = '';
  public $APIParameters;
  protected $__BookListDatesType = 'BookListByDate';
  protected $__BookListDatesDataType = 'array';
  public $BookListDates;
  public function setAPIParameters(ApiParameters $APIParameters) {
    $this->APIParameters = $APIParameters;
  }
  public function getAPIParameters() {
    return $this->APIParameters;
  }
  public function setBookListDates(BookListByDate $BookListDates) {
    $this->BookListDates = $BookListDates;
  }
  public function getBookListDates() {
    return $this->BookListDates;
  }
}

class BooksListResponse extends apiModel {
  protected $__APIParametersType = 'ApiParameters';
  protected $__APIParametersDataType = '';
  public $APIParameters;
  protected $__BookListsType = 'BookList';
  protected $__BookListsDataType = '';
  public $BookLists;
  public function setAPIParameters(ApiParameters $APIParameters) {
    $this->APIParameters = $APIParameters;
  }
  public function getAPIParameters() {
    return $this->APIParameters;
  }
  public function setBookLists(BookList $BookLists) {
    $this->BookLists = $BookLists;
  }
  public function getBookLists() {
    return $this->BookLists;
  }
}

class CategoriesItem extends apiModel {
  public $CategoryID;
  public $CategoryName;
  public function setCategoryID($CategoryID) {
    $this->CategoryID = $CategoryID;
  }
  public function getCategoryID() {
    return $this->CategoryID;
  }
  public function setCategoryName($CategoryName) {
    $this->CategoryName = $CategoryName;
  }
  public function getCategoryName() {
    return $this->CategoryName;
  }
}

class CategoriesResponse extends apiModel {
  protected $__APIParametersType = 'ApiParameters';
  protected $__APIParametersDataType = '';
  public $APIParameters;
  protected $__CategoriesType = 'CategoriesItem';
  protected $__CategoriesDataType = 'array';
  public $Categories;
  public function setAPIParameters(ApiParameters $APIParameters) {
    $this->APIParameters = $APIParameters;
  }
  public function getAPIParameters() {
    return $this->APIParameters;
  }
  public function setCategories(CategoriesItem $Categories) {
    $this->Categories = $Categories;
  }
  public function getCategories() {
    return $this->Categories;
  }
}

class Category extends apiModel {
  public $CategoryID;
  public $CategoryName;
  public function setCategoryID($CategoryID) {
    $this->CategoryID = $CategoryID;
  }
  public function getCategoryID() {
    return $this->CategoryID;
  }
  public function setCategoryName($CategoryName) {
    $this->CategoryName = $CategoryName;
  }
  public function getCategoryName() {
    return $this->CategoryName;
  }
}

class ClassesResponse extends apiModel {
  protected $__APIParametersType = 'ApiParameters';
  protected $__APIParametersDataType = '';
  public $APIParameters;
  public $Classes;
  public function setAPIParameters(ApiParameters $APIParameters) {
    $this->APIParameters = $APIParameters;
  }
  public function getAPIParameters() {
    return $this->APIParameters;
  }
  public function setClasses($Classes) {
    $this->Classes = $Classes;
  }
  public function getClasses() {
    return $this->Classes;
  }
}

class Format extends apiModel {
  public $Publisher;
  public $ISBN;
  public $Name;
  public function setPublisher($Publisher) {
    $this->Publisher = $Publisher;
  }
  public function getPublisher() {
    return $this->Publisher;
  }
  public function setISBN($ISBN) {
    $this->ISBN = $ISBN;
  }
  public function getISBN() {
    return $this->ISBN;
  }
  public function setName($Name) {
    $this->Name = $Name;
  }
  public function getName() {
    return $this->Name;
  }
}

class IsbnResponse extends apiModel {
  protected $__APIParametersType = 'ApiParameters';
  protected $__APIParametersDataType = '';
  public $APIParameters;
  protected $__TitleType = 'IsbnTitleEntry';
  protected $__TitleDataType = '';
  public $Title;
  public function setAPIParameters(ApiParameters $APIParameters) {
    $this->APIParameters = $APIParameters;
  }
  public function getAPIParameters() {
    return $this->APIParameters;
  }
  public function setTitle(IsbnTitleEntry $Title) {
    $this->Title = $Title;
  }
  public function getTitle() {
    return $this->Title;
  }
}

class IsbnTitleEntry extends apiModel {
  protected $__CategoryType = 'CategoriesItem';
  protected $__CategoryDataType = '';
  public $Category;
  public $BookListAppearances;
  public $Description;
  public $HighestRank;
  public $Author;
  public $Title;
  protected $__FirstBookListAppearaceType = 'BookListByDate';
  protected $__FirstBookListAppearaceDataType = '';
  public $FirstBookListAppearace;
  public $TitleAPIUrl;
  protected $__FormatsType = 'Format';
  protected $__FormatsDataType = '';
  public $Formats;
  protected $__RankHistoriesType = 'RankHistoryEntry';
  protected $__RankHistoriesDataType = '';
  public $RankHistories;
  public $Class;
  protected $__MostRecentBookListAppearanceType = 'BookListByDate';
  protected $__MostRecentBookListAppearanceDataType = '';
  public $MostRecentBookListAppearance;
  public function setCategory(CategoriesItem $Category) {
    $this->Category = $Category;
  }
  public function getCategory() {
    return $this->Category;
  }
  public function setBookListAppearances($BookListAppearances) {
    $this->BookListAppearances = $BookListAppearances;
  }
  public function getBookListAppearances() {
    return $this->BookListAppearances;
  }
  public function setDescription($Description) {
    $this->Description = $Description;
  }
  public function getDescription() {
    return $this->Description;
  }
  public function setHighestRank($HighestRank) {
    $this->HighestRank = $HighestRank;
  }
  public function getHighestRank() {
    return $this->HighestRank;
  }
  public function setAuthor($Author) {
    $this->Author = $Author;
  }
  public function getAuthor() {
    return $this->Author;
  }
  public function setTitle($Title) {
    $this->Title = $Title;
  }
  public function getTitle() {
    return $this->Title;
  }
  public function setFirstBookListAppearace(BookListByDate $FirstBookListAppearace) {
    $this->FirstBookListAppearace = $FirstBookListAppearace;
  }
  public function getFirstBookListAppearace() {
    return $this->FirstBookListAppearace;
  }
  public function setTitleAPIUrl($TitleAPIUrl) {
    $this->TitleAPIUrl = $TitleAPIUrl;
  }
  public function getTitleAPIUrl() {
    return $this->TitleAPIUrl;
  }
  public function setFormats(Format $Formats) {
    $this->Formats = $Formats;
  }
  public function getFormats() {
    return $this->Formats;
  }
  public function setRankHistories(RankHistoryEntry $RankHistories) {
    $this->RankHistories = $RankHistories;
  }
  public function getRankHistories() {
    return $this->RankHistories;
  }
  public function setClass($Class) {
    $this->Class = $Class;
  }
  public function getClass() {
    return $this->Class;
  }
  public function setMostRecentBookListAppearance(BookListByDate $MostRecentBookListAppearance) {
    $this->MostRecentBookListAppearance = $MostRecentBookListAppearance;
  }
  public function getMostRecentBookListAppearance() {
    return $this->MostRecentBookListAppearance;
  }
}

class RankHistoryEntry extends apiModel {
  protected $__BookListDateType = 'BookListByDate';
  protected $__BookListDateDataType = '';
  public $BookListDate;
  public $Rank;
  public function setBookListDate(BookListByDate $BookListDate) {
    $this->BookListDate = $BookListDate;
  }
  public function getBookListDate() {
    return $this->BookListDate;
  }
  public function setRank($Rank) {
    $this->Rank = $Rank;
  }
  public function getRank() {
    return $this->Rank;
  }
}

class TitlesResponse extends apiModel {
  protected $__APIParametersType = 'ApiParameters';
  protected $__APIParametersDataType = '';
  public $APIParameters;
  public $Titles;
  public function setAPIParameters(ApiParameters $APIParameters) {
    $this->APIParameters = $APIParameters;
  }
  public function getAPIParameters() {
    return $this->APIParameters;
  }
  public function setTitles($Titles) {
    $this->Titles = $Titles;
  }
  public function getTitles() {
    return $this->Titles;
  }
}

class bookListDatesArray extends apiModel {
}

class bookListEntriesArray extends apiModel {
}

class bookListsArray extends apiModel {
}

class categoriesArray extends apiModel {
}

class classesArray extends apiModel {
}

class formatsArray extends apiModel {
}

class rankHistoriesArray extends apiModel {
}

class titlesArray extends apiModel {
}
