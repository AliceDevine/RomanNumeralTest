<?php
namespace PhpNwSykes;

class RomanNumeral
{
    protected $symbols = [
        1000 => 'M',
        500 => 'D',
        100 => 'C',
        50 => 'L',
        10 => 'X',
        5 => 'V',
        1 => 'I',
    ];

    protected $numeral;

    public function __construct(string $romanNumeral)
    {
        $this->numeral = $romanNumeral;
    }

    /**
     * Converts a roman numeral such as 'X' to a number, 10
     *
     * @throws InvalidNumeral on failure (when a numeral is invalid)
     */
    public function toInt()
    {
        $total = 0;

        // Set data array
        $data = ['M' => 1000, 'D' => 500, 'C' => 100, 'L' => 50, 'X' => 10, 'V' => 5, 'I' => 1];

        // split numeral into array
        $numbers = str_split($this->numeral, 1);

        // Loop through the array
        for ($x = 0; $x < count($numbers); $x++) {

            // throw exception if $data[$numbers[$x]] is not a valid numeral
            if (!isset($data[$numbers[$x]])) {
                throw new InvalidNumeral();
            }

            // Logic to add the number. If the numeral is less than the next, subtract it from total, else add to total (so IV will -1 then add 5 still totalling 4)
            if ($data[$numbers[$x]] < $data[$numbers[$x + 1]]) {
                $total -= $data[$numbers[$x]];
            } else {
                $total += $data[$numbers[$x]];
            }
        }

        // return the answer
        return $total;
    }
}
