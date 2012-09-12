<?php
/**
 * Unit Tests
 *
 * @copyright 2012 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @version 1.0.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

require_once('objstorebase.inc');
require_once('http.inc');

// stub class, since ObjStoreBase is abstract
class MyObjStoreBase extends OpenCloud\ObjectStore\ObjStoreBase {}

class ObjStoreBaseTest extends PHPUnit_Framework_TestCase
{
    private
        $obj;
    public function __construct() {
        $this->obj = new MyObjStoreBase();
    }
    /**
     * Tests
     */
    public function test__construct() {
        $this->assertEquals(
            'OpenCloud\Metadata',
            get_class($this->obj->metadata));
    }
    /**
     * @expectedException OpenCloud\ObjectStore\MetadataPrefixError
     */
    public function testGetMetadata() {
        $blank = new OpenCloud\BlankResponse();
        $blank->headers = array(
            'X-Meta-Something'=>'FOO',
            'X-Meta-Else'=>'BAR'
        );
        $this->obj->GetMetadata($blank);
    }
}