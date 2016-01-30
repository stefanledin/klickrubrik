<?php
class CleanFilenameTest extends PHPUnit_Framework_TestCase {

	function test_it_removes_special_characters()
	{
		$filename = 'Skärmavbild 2016-01-04 kl. 19.10.24.jpg';
		$cleanFilename = cleanFilename($filename);

		$this->assertEquals('skrmavbild-2016-01-04-kl.-19.10.24.jpg', $cleanFilename);
	}

}