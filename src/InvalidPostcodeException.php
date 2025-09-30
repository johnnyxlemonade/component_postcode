<?php declare(strict_types=1);

/**
 * Class InvalidPostcodeException
 *
 * Lemonade\Postcode
 * @author Honza Mudrak <honzamudrak@gmail.com>
 */

namespace Lemonade\Postcode;
use Exception;

/**
 * Vyjimka vyvolana pri pokusu o formatovani neplatneho postovniho smerovaciho cisla.
 */
class InvalidPostcodeException extends Exception
{

}