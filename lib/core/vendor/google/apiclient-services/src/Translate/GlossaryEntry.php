<?php
/*
 * Copyright 2014 Google Inc.
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

namespace Google\Service\Translate;

class GlossaryEntry extends \Google\Model
{
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $name;
  protected $termsPairType = GlossaryTermsPair::class;
  protected $termsPairDataType = '';
  public $termsPair;
  protected $termsSetType = GlossaryTermsSet::class;
  protected $termsSetDataType = '';
  public $termsSet;

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GlossaryTermsPair
   */
  public function setTermsPair(GlossaryTermsPair $termsPair)
  {
    $this->termsPair = $termsPair;
  }
  /**
   * @return GlossaryTermsPair
   */
  public function getTermsPair()
  {
    return $this->termsPair;
  }
  /**
   * @param GlossaryTermsSet
   */
  public function setTermsSet(GlossaryTermsSet $termsSet)
  {
    $this->termsSet = $termsSet;
  }
  /**
   * @return GlossaryTermsSet
   */
  public function getTermsSet()
  {
    return $this->termsSet;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GlossaryEntry::class, 'Google_Service_Translate_GlossaryEntry');
