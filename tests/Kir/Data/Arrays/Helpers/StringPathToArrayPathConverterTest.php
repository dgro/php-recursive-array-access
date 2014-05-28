<?php
namespace Kir\Data\Arrays\Helpers;

class StringPathToArrayPathConverterTest extends \PHPUnit_Framework_TestCase {
	public function testConvert() {
		$path = StringPathToArrayPathConverter::convert('this.is.a.test', '.', '\\');
		$this->assertEquals(array('this', 'is', 'a', 'test'), $path);
	}

	public function testConvertWithDifferentSeparator() {
		$path = StringPathToArrayPathConverter::convert('this|is|a|test', '|', '\\');
		$this->assertEquals(array('this', 'is', 'a', 'test'), $path);
	}

	public function testConvertWithEscapeChar() {
		$path = StringPathToArrayPathConverter::convert('this.is.a\\.test', '.', '\\');
		$this->assertEquals(array('this', 'is', 'a.test'), $path);
	}

	public function testConvertWithEscapedEscapeChar1() {
		$path = StringPathToArrayPathConverter::convert('this.is.a\\\\.test', '.', '\\');
		$this->assertEquals(array('this', 'is', 'a\\', 'test'), $path);
	}

	public function testConvertWithEscapedEscapeChar2() {
		$path = StringPathToArrayPathConverter::convert('this.is.a\\\\\\\\.test', '.', '\\');
		$this->assertEquals(array('this', 'is', 'a\\\\', 'test'), $path);
	}

	public function testConvertWithEscapedEscapeChar3() {
		$path = StringPathToArrayPathConverter::convert('this.is.a\\\\\\\\\\.test', '.', '\\');
		$this->assertEquals(array('this', 'is', 'a\\\\.test'), $path);
	}
}
 