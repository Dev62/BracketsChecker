<?php

namespace Dev62\BracketsChecker;

class BracketsChecker
{
    private $brackets;

    public function __construct(string $brackets)
    {
        if (strlen($brackets) > 0) {
            $this->brackets = $brackets;
        }
        else {
            throw new \InvalidArgumentException('Символы не переданы');
        }
    }


    public function check(): bool
    {
        $open = '(';
        $close = ')';

        $opened_count = 0;

        for ($i = 0; $i < strlen($this->brackets); $i++) {
            if ($this->brackets[$i] == $open) {
                $opened_count += 1;
            }
            elseif($this->brackets[$i] == $close) {
                $opened_count -= 1;
                if ($opened_count < 0) {
                    return false;
                }
            }
            else {
                if (!preg_match('/\s/', $this->brackets[$i])) {
                    throw new \InvalidArgumentException('Переданы неверные символы');
                }
            }
        }

        return $opened_count == 0;
    }
}
