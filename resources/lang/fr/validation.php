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

    'accepted'             => 'Le\La :attribute doit être accepté.',
    'active_url'           => 'Le\La :attribute une URL valide.',
    'after'                => 'Le\La :attribute doit être précédé du :date.',
    'after_or_equal'       => 'Le\La :attribute doit être suivant ou égale au :date.',
    'alpha'                => 'Le\La :attribute ne doit conténir que des lettres.',
    'alpha_dash'           => 'Le\La :attribute ne doit conténir que des lettres, des nombres, et des traits d\'unions.',
    'alpha_num'            => 'Le\La :attribute ne doit conténir que des lettres et des nombres.',
    'array'                => 'Le\La :attribute doit être un tableau.',
    'before'               => 'Le\La :attribute doit être a date before :date.',
    'before_or_equal'      => 'Le\La :attribute doit être a date before or equal to :date.',
    'between'              => [
        'numeric' => 'Le\La :attribute doit être between :min and :max.',
        'file'    => 'Le\La :attribute doit être between :min and :max kilobytes.',
        'string'  => 'Le\La :attribute doit être between :min and :max characters.',
        'array'   => 'Le\La :attribute doit have between :min and :max items.',
    ],
    'boolean'              => 'Le\La :attribute field doit être true or false.',
    'confirmed'            => 'Le\La :attribute confirmation does not match.',
    'date'                 => 'Le\La :attribute is not a valid date.',
    'date_format'          => 'Le\La :attribute does not match the format :format.',
    'different'            => 'Le\La :attribute and :other doit être different.',
    'digits'               => 'Le\La :attribute doit être :digits digits.',
    'digits_between'       => 'Le\La :attribute doit être between :min and :max digits.',
    'dimensions'           => 'Le\La :attribute has invalid image dimensions.',
    'distinct'             => 'Le\La :attribute field has a duplicate value.',
    'email'                => 'Le\La :attribute doit être a valid email address.',
    'exists'               => 'Le\La selected :attribute is invalid.',
    'file'                 => 'Le\La :attribute doit être a file.',
    'filled'               => 'Le\La :attribute field is required.',
    'image'                => 'Le\La :attribute doit être an image.',
    'in'                   => 'Le\La selected :attribute is invalid.',
    'in_array'             => 'Le\La :attribute field does not exist in :other.',
    'integer'              => 'Le\La :attribute doit être an integer.',
    'ip'                   => 'Le\La :attribute doit être a valid IP address.',
    'json'                 => 'Le\La :attribute doit être a valid JSON string.',
    'max'                  => [
        'numeric' => 'Le\La :attribute may not be greater than :max.',
        'file'    => 'Le\La :attribute may not be greater than :max kilobytes.',
        'string'  => 'Le\La :attribute may not be greater than :max characters.',
        'array'   => 'Le\La :attribute may not have more than :max items.',
    ],
    'mimes'                => 'Le\La :attribute doit être a file of type: :values.',
    'mimetypes'            => 'Le\La :attribute doit être a file of type: :values.',
    'min'                  => [
        'numeric' => 'Le\La :attribute doit être at least :min.',
        'file'    => 'Le\La :attribute doit être at least :min kilobytes.',
        'string'  => 'Le\La :attribute doit être at least :min characters.',
        'array'   => 'Le\La :attribute doit have at least :min items.',
    ],
    'not_in'               => 'Le\La selected :attribute is invalid.',
    'numeric'              => 'Le\La :attribute doit être a number.',
    'present'              => 'Le\La :attribute field doit être present.',
    'regex'                => 'Le\La :attribute format is invalid.',
    'required'             => 'Le\La :attribute field is required.',
    'required_if'          => 'Le\La :attribute field is required when :other is :value.',
    'required_unless'      => 'Le\La :attribute field is required unless :other is in :values.',
    'required_with'        => 'Le\La :attribute field is required when :values is present.',
    'required_with_all'    => 'Le\La :attribute field is required when :values is present.',
    'required_without'     => 'Le\La :attribute field is required when :values is not present.',
    'required_without_all' => 'Le\La :attribute field is required when none of :values are present.',
    'same'                 => 'Le\La :attribute and :other doit match.',
    'size'                 => [
        'numeric' => 'Le\La :attribute doit être :size.',
        'file'    => 'Le\La :attribute doit être :size kilobytes.',
        'string'  => 'Le\La :attribute doit être :size characters.',
        'array'   => 'Le\La :attribute doit contain :size items.',
    ],
    'string'               => 'Le\La :attribute doit être a string.',
    'timezone'             => 'Le\La :attribute doit être a valid zone.',
    'unique'               => 'Le\La :attribute has already been taken.',
    'uploaded'             => 'Le\La :attribute failed to upload.',
    'url'                  => 'Le\La :attribute format is invalid.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
