<?php
/**
 * Empty with non variable sniff test file
 *
 * @package PHPCompatibility
 */


/**
 * Empty with non variable sniff test file
 *
 * @uses    BaseSniffTest
 * @package PHPCompatibility
 * @author  Juliette Reinders Folmer <phpcompatibility_nospam@adviesenzo.nl>
 */
class EmptyNonVariableSniffTest extends BaseSniffTest
{
    const TEST_FILE = 'sniff-examples/empty_non_variable.php';

    /**
     * testEmptyNonVariable
     *
     * @group emptyNonVariable
     *
     * @dataProvider dataEmptyNonVariable
     *
     * @param int $line The line number.
     *
     * @return void
     */
    public function testEmptyNonVariable($line)
    {
        $file = $this->sniffFile(self::TEST_FILE, '5.4');
        $this->assertError($file, $line, 'Only variables can be passed to empty() prior to PHP 5.5.');

        $file = $this->sniffFile(self::TEST_FILE, '5.5');
        $this->assertNoViolation($file, $line);
    }

    /**
     * Data provider.
     *
     * @see testEmptyNonVariable()
     *
     * @return array
     */
    public function dataEmptyNonVariable()
    {
        return array(
            array(17),
            array(18),

            array(20),
            array(21),
            array(22),
            array(23),

            array(25),
            array(26),
            array(27),
            array(28),
            array(29),
            array(30),
            array(31),
            array(32),

            array(34),
            array(35),
            array(37),
            array(38),
            array(39),
            array(40),

            array(42),
            array(43),
        );
    }


    /**
     * testNoViolation
     *
     * @group emptyNonVariable
     *
     * @dataProvider dataNoViolation
     *
     * @param int $line The line number.
     *
     * @return void
     */
    public function testNoViolation($line)
    {
        $file = $this->sniffFile(self::TEST_FILE, '5.3');
        $this->assertNoViolation($file, $line);
    }

    /**
     * Data provider.
     *
     * @see testNoViolation()
     *
     * @return array
     */
    public function dataNoViolation()
    {
        return array(
            array(4),
            array(5),
            array(6),
            array(7),
            array(8),
            array(9),
            array(10),
            array(11),
            array(12),
            array(13),
            array(14),
        );
    }
}
