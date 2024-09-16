<?php

function translateStatusAll($status)
{
    switch ($status) {
        case 'moderation':
            return 'В процессе общей квалификации';
        case 'document':
            return 'Требуется дополнительный пакет документов';
        case 'audit':
            return 'Аудит';
        case  'approved':
            return 'Общая классификация пройдена';
        case  'cancelled':
            return 'Общая классификация не пройдена';
    }

}

function translateStatus($status)
{
    switch ($status) {
        case 'moderation':
            return 'В процессе квалификации по категории';
        case 'document':
            return 'Требуется дополнительный пакет документов';
        case 'audit':
            return 'Аудит';
        case  'approved':
            return 'Классификация по категории пройдена';
        case  'cancelled':
            return 'Классификация по категории не пройдена';
    }

}

function translateRole($role)
{
    switch ($role) {
        case 'admin':
            return 'Админ';
        case 'document':
            return 'Требуется дополнительный пакет документов';
        case 'audit':
            return 'Аудит';
        case  'approved':
            return 'Классификация по категории пройдена';
        case  'cancelled':
            return 'Классификация по категории не пройдена';
    }
    function getEv($data)
    {
        $count = 0;
        $sum = 0;
        foreach ($data as $key => $item) {
            $count += $item;
            $sum += ($key * $item);
        }
        return $sum / $count;
    }
}
