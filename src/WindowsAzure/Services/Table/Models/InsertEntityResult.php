<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * PHP version 5
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Table\Models;
use PEAR2\WindowsAzure\Utilities;
use PEAR2\WindowsAzure\Resources;

/**
 * Holds result of calling insertEntity wrapper
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class InsertEntityResult
{
    /**
     * @var Entity
     */
    private $_entity;
    
    /**
     * Create InsertEntityResult object from HTTP response parts.
     * 
     * @param string           $body           The HTTP response body.
     * @param array            $headers        The HTTP response headers.
     * @param AtomReaderWriter $atomSerializer The atom serializer.
     * 
     * @return \PEAR2\WindowsAzure\Services\Table\Models\InsertEntityResult
     * 
     * @static
     */
    public static function create($body, $headers, $atomSerializer)
    {
        $result = new InsertEntityResult();
        $entity = $atomSerializer->parseEntity($body);
        $entity->setEtag(Utilities::tryGetValue($headers, Resources::ETAG));
        $result->setEntity($entity);
        
        return $result;
    }
    
    /**
     * Gets table entity.
     * 
     * @return Entity
     */
    public function getEntity()
    {
        return $this->_entity;
    }
    
    /**
     * Sets table entity.
     * 
     * @param Entity $entity The table entity instance.
     * 
     * @return none
     */
    public function setEntity($entity)
    {
        $this->_entity = $entity;
    }
}

?>
