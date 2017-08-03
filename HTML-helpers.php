/**
 * Получить список значений калькулятора
 * @param $type string Тип списка
 * @param $userValue string Данные выбранные пользователем на предыдущем шаге регистрации,
 * @return string
 */
function getCalcListValues($type, $userValue = '') {
    if (!in_array($type, ['amount' , 'period', 'periodType', 'city'])) {
        return '';
    }

    $result = '';
    $defaultValues = include view . 'parts/calculator-default-values.php';
    $selectedValue = ex($userValue) ? $userValue : $defaultValues['selected'][$type][0];
    foreach ($defaultValues['allValues'][$type] as $value => $name) {
        $selected = ($value == $selectedValue) ? 'selected="selected"' : '';
        $result .= '<option value="' . $value . '" ' . $selected . '>' . $name . '</option>' . eol;
    }
    return $result;
}
