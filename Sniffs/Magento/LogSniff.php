<?php
/**
 * Made_Sniffs_Magento_LogSniff.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer_Made
 * @author    Mike Whitby <michael.whitby@made.com>
 * @copyright 2012 made.com
 * @license   http://www.made.com/license.txt Commercial license
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * Made_Sniffs_Magento_LogSniff.
 *
 * Discourages the use of Mage::log()
 *
 * @category  PHP
 * @package   PHP_CodeSniffer_Made
 * @author    Mike Whitby <michael.whitby@made.com>
 * @copyright 2012 made.com
 * @license   http://www.made.com/license.txt Commercial license
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Made_Sniffs_Magento_LogSniff implements PHP_CodeSniffer_Sniff
{

    /**
     * If true, an error will be thrown; otherwise a warning.
     *
     * @var bool
     */
    public $error = true;


    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(T_DOUBLE_COLON);

    }//end register()


    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token in
     *                                        the stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        $prevToken = $tokens[$stackPtr - 1];
        $nextToken = $tokens[$stackPtr + 1];

        if ($prevToken['content'] == 'Mage' && $nextToken['content'] == 'log') {
            $phpcsFile->addWarning('Mage::log() debugging is discouraged', $stackPtr, 'Discouraged');
        }
    }//end process()


}//end class

?>
