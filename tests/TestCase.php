<?php

/**
 * Class: TestCase
 *
 * PHP Version 5.6
 *
 * @category Testing
 * @package  Ideamart
 * @author   Gnanakeethan Balasubramaniam <gnana@keethan.me>
 * @license  MIT http://opensource.org/licenses/MIT/
 * @link     http://github.com/joomtriggers/ideamart-php/
 *
 * @see PHPUnit_Framework_TestCase
 */
namespace Joomtriggers\Ideamart\Tests;
use \PHPUnit_Framework_TestCase;

if (!class_exists('\PHPUnit\Framework\TestCase') &&
	class_exists('\PHPUnit_Framework_TestCase')) {
	class_alias('\PHPUnit_Framework_TestCase', '\PHPUnit\Framework\TestCase');
}
/**
 * Class: TestCase
 *
 * @category Testing
 * @package  Ideamart
 * @author   Gnanakeethan Balasubramaniam <gnana@keethan.me>
 * @license  MIT http://opensource.org/licenses/MIT/
 * @link     http://github.com/joomtriggers/ideamart-php/
 *
 * @see PHPUnit_Framework_TestCase
 */
class TestCase extends PHPUnit_Framework_TestCase
{

}
