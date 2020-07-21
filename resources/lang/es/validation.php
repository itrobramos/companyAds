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

    'accepted' => 'EL :attribute must be accepted.',
    'active_url' => 'EL :attribute is not a valid URL.',
    'after' => 'EL :attribute must be a date after :date.',
    'after_or_equal' => 'EL :attribute must be a date after or equal to :date.',
    'alpha' => 'EL :attribute may only contain letters.',
    'alpha_dash' => 'EL :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'EL :attribute may only contain letters and numbers.',
    'array' => 'EL :attribute must be an array.',
    'before' => 'EL :attribute must be a date before :date.',
    'before_or_equal' => 'EL :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'EL :attribute must be between :min and :max.',
        'file' => 'EL :attribute must be between :min and :max kilobytes.',
        'string' => 'EL :attribute must be between :min and :max characters.',
        'array' => 'EL :attribute must have between :min and :max items.',
    ],
    'boolean' => 'EL :attribute field must be true or false.',
    'confirmed' => 'EL :attribute confirmation does not match.',
    'date' => 'EL :attribute is not a valid date.',
    'date_equals' => 'EL :attribute must be a date equal to :date.',
    'date_format' => 'EL :attribute does not match the format :format.',
    'different' => 'EL :attribute and :other must be different.',
    'digits' => 'EL :attribute must be :digits digits.',
    'digits_between' => 'EL :attribute must be between :min and :max digits.',
    'dimensions' => 'EL :attribute has invalid image dimensions.',
    'distinct' => 'EL :attribute field has a duplicate value.',
    'email' => 'EL :attribute must be a valid email address.',
    'ends_with' => 'EL :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'EL :attribute must be a file.',
    'filled' => 'EL :attribute field must have a value.',
    'gt' => [
        'numeric' => 'EL :attribute must be greater than :value.',
        'file' => 'EL :attribute must be greater than :value kilobytes.',
        'string' => 'EL :attribute must be greater than :value characters.',
        'array' => 'EL :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'EL :attribute must be greater than or equal :value.',
        'file' => 'EL :attribute must be greater than or equal :value kilobytes.',
        'string' => 'EL :attribute must be greater than or equal :value characters.',
        'array' => 'EL :attribute must have :value items or more.',
    ],
    'image' => 'EL :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'EL :attribute field does not exist in :other.',
    'integer' => 'EL :attribute must be an integer.',
    'ip' => 'EL :attribute must be a valid IP address.',
    'ipv4' => 'EL :attribute must be a valid IPv4 address.',
    'ipv6' => 'EL :attribute must be a valid IPv6 address.',
    'json' => 'EL :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'EL :attribute must be less than :value.',
        'file' => 'EL :attribute must be less than :value kilobytes.',
        'string' => 'EL :attribute must be less than :value characters.',
        'array' => 'EL :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'EL :attribute must be less than or equal :value.',
        'file' => 'EL :attribute must be less than or equal :value kilobytes.',
        'string' => 'EL :attribute must be less than or equal :value characters.',
        'array' => 'EL :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'EL :attribute may not be greater than :max.',
        'file' => 'EL :attribute may not be greater than :max kilobytes.',
        'string' => 'EL :attribute may not be greater than :max characters.',
        'array' => 'EL :attribute may not have more than :max items.',
    ],
    'mimes' => 'EL :attribute must be a file of type: :values.',
    'mimetypes' => 'EL :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'EL :attribute must be at least :min.',
        'file' => 'EL :attribute must be at least :min kilobytes.',
        'string' => 'EL :attribute must be at least :min characters.',
        'array' => 'EL :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'EL :attribute format is invalid.',
    'numeric' => 'EL :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'EL :attribute field must be present.',
    'regex' => 'EL :attribute format is invalid.',
    'required' => 'EL :attribute field is required.',
    'required_if' => 'EL :attribute field is required when :other is :value.',
    'required_unless' => 'EL :attribute field is required unless :other is in :values.',
    'required_with' => 'EL :attribute field is required when :values is present.',
    'required_with_all' => 'EL :attribute field is required when :values are present.',
    'required_without' => 'EL :attribute field is required when :values is not present.',
    'required_without_all' => 'EL :attribute field is required when none of :values are present.',
    'same' => 'EL :attribute and :other must match.',
    'size' => [
        'numeric' => 'EL :attribute must be :size.',
        'file' => 'EL :attribute must be :size kilobytes.',
        'string' => 'EL :attribute must be :size characters.',
        'array' => 'EL :attribute must contain :size items.',
    ],
    'starts_with' => 'EL :attribute must start with one of the following: :values.',
    'string' => 'EL :attribute must be a string.',
    'timezone' => 'EL :attribute must be a valid zone.',
    'unique' => 'EL :attribute has already been taken.',
    'uploaded' => 'EL :attribute failed to upload.',
    'url' => 'EL :attribute format is invalid.',
    'uuid' => 'EL :attribute must be a valid UUID.',

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
