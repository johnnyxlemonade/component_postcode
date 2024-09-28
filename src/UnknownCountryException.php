<?php declare(strict_types=1);

/**
 * Class UnknownCountryException
 *
 * Lemonade\Postcode
 * @author Honza Mudrak <honzamudrak@gmail.com>
 */
namespace Lemonade\Postcode;
use Exception;

/**
 * Vyjimka vyvolana pri pokusu o formatovani neznameho statu
 */
class UnknownCountryException extends Exception
{

}