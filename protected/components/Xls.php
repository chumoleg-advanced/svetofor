<?php

class Xls
{
    public function xlsBOF()
    {
        return pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    }

    public function xlsEOF()
    {
        return pack("ss", 0x0A, 0x00);
    }

    public function xlsWriteNumber($row, $col, $value)
    {
        $data = pack("sssss", 0x203, 14, $row, $col, 0x0);
        $data .= pack("d", $value);

        return $data;
    }

    public function xlsWriteLabel($row, $col, $value)
    {
        $l = strlen($value);
        $data = pack("ssssss", 0x204, 8 + $l, $row, $col, 0x0, $l);
        $data .= $value;

        return $data;
    }
}
