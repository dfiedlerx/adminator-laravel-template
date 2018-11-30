<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'O campo :attribute deve ser aceito.',
    'active_url'           => 'O campo :attribute não é uma URL válida.',
    'after'                => 'O campo :attribute deve ser uma data posterior a :date.',
    'after_or_equal'       => 'O campo :attribute deve ser uma data superior ou igual a :date.',
    'alpha'                => 'O campo :attribute deve ser apenas letras.',
    'alpha_dash'           => 'O campo :attribute só pode conter letras, números e traços.',
    'alpha_num'            => 'O campo :attribute só pode conter letras e números.',
    'array'                => 'O campo :attribute deve conter um array.',
    'before'               => 'O campo :attribute deve conter uma data anterior a :date.',
    'before_or_equal'      => 'O campo :attribute deve conter uma data inferior ou igual a :date.',
    'between' => [
        'numeric' => 'O campo :attribute deve conter um número entre :min e :max.',
        'file'    => 'O campo :attribute deve conter um arquivo de :min a :max kilobytes.',
        'string'  => 'O campo :attribute deve conter entre :min a :max caracteres.',
        'array'   => 'O campo :attribute deve conter de :min a :max itens.',
    ],
    'boolean'              => 'O campo :attribute deve conter o valor verdadeiro ou falso.',
    'confirmed'            => 'O campo :attribute de confirmação não coincide.',
    'date'                 => 'O campo :attribute não contém uma data válida.',
    'date_equals' => 'O campo :attribute deve ser uma data igual a :date.',
    'date_format'          => 'O campo :attribute não corresponde ao formato :format.',
    'different'            => 'Os campos :attribute e :other devem ser diferentes.',
    'digits'               => 'O campo :attribute deve ter :digits dígitos.',
    'digits_between'       => 'O campo :attribute deve ter entre :min e :max dígitos.',
    'dimensions'           => 'O campo :attribute tem dimensões de imagem inválidas.',
    'distinct'             => 'O campo :attribute campo tem um valor duplicado.',
    'email'                => 'O campo :attribute deve ser um endereço de e-mail válido.',
    'exists'               => 'O campo :attribute selecionado é inválido.',
    'file'                 => 'O campo :attribute deve ser um arquivo.',
    'filled'               => 'O campo :attribute deve ter um valor.',
    'gt' => [
        'numeric' => 'The :attribute deve ser maior que :value.',
        'file' => 'O arquivo :attribute deve ser maior que :value kilobytes.',
        'string' => 'O comprimento do campo :attribute deve ser maior que :value caracteres.',
        'array' => 'O total de itens no campo :attribute deve ser maior que :value itens.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image'                => 'O campo :attribute deve ser uma imagem.',
    'in'                   => 'O campo :attribute selecionado é inválido.',
    'in_array'             => 'O campo :attribute não existe em :other.',
    'integer'              => 'O campo :attribute deve ser um número inteiro.',
    'ip'                   => 'O campo :attribute deve ser um endereço de IP válido.',
    'ipv4'                 => 'O campo :attribute deve ser um endereço IPv4 válido.',
    'ipv6'                 => 'O campo :attribute deve ser um endereço IPv6 válido.',
    'json'                 => 'O campo :attribute deve ser uma string JSON válida.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max'                  => [
        'numeric' => 'O campo :attribute não pode ser superior a :max.',
        'file'    => 'O campo :attribute não pode ser superior a :max kilobytes.',
        'string'  => 'O campo :attribute não pode ser superior a :max caracteres.',
        'array'   => 'O campo :attribute não pode ter mais do que :max itens.',
    ],
    'mimes'                => 'O campo :attribute deve ser um arquivo do tipo: :values.',
    'mimetypes'            => 'O campo :attribute deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => 'O campo :attribute deve ser pelo menos :min.',
        'file'    => 'O campo :attribute deve ter pelo menos :min kilobytes.',
        'string'  => 'O campo :attribute deve ter pelo menos :min caracteres.',
        'array'   => 'O campo :attribute deve ter pelo menos :min itens.',
    ],
    'not_in'               => 'O campo :attribute selecionado é inválido.',
    'numeric'              => 'O campo :attribute deve ser um número.',
    'present'              => 'O campo :attribute deve estar presente.',
    'regex'                => 'O campo :attribute tem um formato inválido.',
    'required'             => 'O campo :attribute é obrigatório.',
    'required_if'          => 'O campo :attribute é obrigatório quando :other for :value.',
    'required_unless'      => 'O campo :attribute é obrigatório exceto quando :other for :values.',
    'required_with'        => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all'    => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_without'     => 'O campo :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum dos :values estão presentes.',
    'same'                 => 'Os campos :attribute e :other devem corresponder.',
    'size'                 => [
        'numeric' => 'O campo :attribute deve ser :size.',
        'file'    => 'O campo :attribute deve ser :size kilobytes.',
        'string'  => 'O campo :attribute deve ser :size caracteres.',
        'array'   => 'O campo :attribute deve conter :size itens.',
    ],
    'starts_with' => 'O campo :attribute deve iniciar com os seguintes valores :values',
    'string'               => 'O campo :attribute deve ser uma string.',
    'timezone'             => 'O campo :attribute deve ser uma zona válida.',
    'unique'               => 'O campo :attribute já está sendo utilizado.',
    'uploaded'             => 'Ocorreu uma falha no upload do campo :attribute.',
    'url'                  => 'O campo :attribute tem um formato inválido.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
