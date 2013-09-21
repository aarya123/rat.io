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

/**
 * Do-nothing authentication implementation, use this if you want to make un-authenticated calls
 * @author Chris Chabot <chabotc@google.com>
 * @author Chirag Shah <chirags@google.com>
 */
class apiAuthNone extends apiAuth {
  public $key = null;

  public function __construct() {
    global $apiConfig;
    if (!empty($apiConfig['developer_key'])) {
      $this->setDeveloperKey($apiConfig['developer_key']);
    }
    if (!empty($apiConfig['developer_secret'])) {
      $this->setDeveloperSecret($apiConfig['developer_secret']);
    }
  }

  public function setDeveloperKey($key) {$this->key = $key;}
  public function setDeveloperSecret($secret) {$this->secret = $secret;}

  public function sign(apiHttpRequest $request) {
    global $apiConfig;
    $sig = "";
    if ($this->key) {
        if ($this->secret) {
            $sig = md5($this->key . $this->secret . (string)time());
    }
    $request->setUrl(
        $request->getUrl() . 
        ((strpos($request->getUrl(), '?') === false) ? '?' : '&') .
        $apiConfig['key_name'].'='.urlencode($this->key) . 
        (($sig) ? ('&' . $apiConfig['signature_name'] . '=' . urlencode($sig)) : '')
    );
    /*
     * Mod above - static "key" parameter name changed
     * to global $apiConfig variable "key_name" add signature
     * if secret exists.
     */
    }
    return $request;
  }
}
