<?php

namespace GingerPlugins\Log;

class Log
{
    private static $rLogFile;
    private static $gingerLogFile;

    /**
     * Write a log entry into a log file
     *
     * @static
     *
     * @param string $sFunction = Name of the file or function currently in
     * @param string $sType = Type of action or log
     * @param string $sValue = Value associated with this action
     * @param bool $ginger_log = If errors logged to Ginger log file
     */
    public static function Write(string $sFunction = '', string $sType = '', string $sValue = '', bool $ginger_log = false)
    {
        $sLog = date('Y-m-d H:i:s') . ' '; #timestamp
        $sLog .= '[' . str_pad($sFunction, 34, ' ', STR_PAD_LEFT) . '] - '; #File/Function Name
        $sLog .= str_pad(strtoupper($sType), 15, ' ', STR_PAD_LEFT) . ' - '; #Type of log
        $sLog .= '[' . $sValue . ']'; #Value of the action
        $sLog .= "\r\n"; #EOL
        $logFile = static::OpenFile($ginger_log);

        if ($logFile) {
            fwrite($logFile, $sLog);
        } else {
            // Handle error if the log file could not be opened
            error_log("Unable to open log file.");
        }
    }

    public static function WriteStartCall($sFile = '', $ginger_log = false)
    {
        static::Write('START CALL', '', $sFile, $ginger_log);
    }

    public static function WriteEndCall($sFile = '', $ginger_log = false)
    {
        static::Write('END CALL', '', $sFile, $ginger_log);
        $logFile = static::OpenFile($ginger_log);

        if ($logFile) {
            fwrite($logFile, "\r\n");
        } else {
            // Handle error if the log file could not be opened
            error_log("Unable to open log file.");
        }
    }

    /**
     * Function to open or create a logfile.
     *
     * @static
     * @return mixed
     */
    private static function OpenFile($ginger_log = false): mixed
    {
        if ($ginger_log) {
            if (!is_resource(static::$gingerLogFile)) {
                static::$gingerLogFile = @fopen(
                    $_SERVER['DOCUMENT_ROOT'] . '/Log/GingerAPI/' . date('Y-m-d') . '_GingerAPI.log',
                    'a'
                );
            }

            return static::$gingerLogFile;
        } else {
            if (!is_resource(static::$rLogFile)) {
                static::$rLogFile = @fopen(
                    $_SERVER['DOCUMENT_ROOT'] . '/Log/' . date('Y-m-d') . '_AppConnector.log',
                    'a'
                );
            }
            return static::$rLogFile;
        }
    }
}
