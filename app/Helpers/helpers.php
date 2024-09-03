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
