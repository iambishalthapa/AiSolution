<?php

/**
 * Class Qcformbuilder_Forms_Entry_Fields
 *
 * A collection of many field values, from different entries of the same form.
 */
class Qcformbuilder_Forms_Entry_Fields implements \qcformbuilderwp\QcformbuilderContainers\Interfaces\Arrayable
{

    /**
     * The collected fields
     *
     * @since 1.7.0
     *
     * @var  Qcformbuilder_Forms_Entry_Field[] $fields
     */
    protected $fields;
    /**
     * The form config
     *
     * @since 1.7.0
     *
     * @var array
     */
    protected $form;

    /**
     * Qcformbuilder_Forms_Entry_Fields constructor.
     * @param array $form Form configuration
     * @param Qcformbuilder_Forms_Entry_Field[] $fields
     */
    public function __construct(array  $form, array  $fields = [] )
    {
        $this->form = $form;
        if( ! empty( $fields ) ){
            $this->set_fields_form_array( $fields );
        }
    }

    /** @inheritdoc */
    public function toArray()
    {
        if (empty($this->fields)) {
            return [];
        }
        $fields = [];
        /** @var Qcformbuilder_Forms_Entry_Field $field */
        foreach ($this->get_fields() as $field) {
            $fields[$field->field_id] = $field->to_array(false);
        }
        return $fields;
    }

    /**
     * Get the collection of fields
     *
     * @since 1.7.0
     *
     * @return Qcformbuilder_Forms_Entry_Field[]
     */
    public function get_fields(){
        return $this->fields;
    }

    /**
     * Check if there is an entry value for an entry ID in this collection
     *
     * @since 1.7.0
     *
     * @param string $entry_id The entry's ID
     * @return bool
     */
    public function has_field( $entry_id ){
        return isset( $this->fields[ $entry_id ] );
    }

    /**
     * Get total number of field values in collection
     *
     * @since 1.7.0
     *
     * @return int
     */
    public function count(){
        return is_array( $this->fields ) ? count( $this->fields ) : 0;
    }

    /**
     * Add a field to collection
     *
     * @since 1.7.0
     *
     * @param Qcformbuilder_Forms_Entry_Field $field
     * @return $this
     */
    public function add_field( Qcformbuilder_Forms_Entry_Field $field ){
        $this->fields[$field->entry_id] = $field;
        return $this;
    }

    /**
     * Get a field from collection
     *
     * @since 1.7.0
     *
     * @param string $field_id Field ID (form config, not DB id column)
     * @return Qcformbuilder_Forms_Entry_Field
     * @throws Exception
     */
    public function get_field( $field_id ){
        if( $this->has_field( $field_id ) ){
            return $this->fields[ $field_id ];
        }
        throw new Exception( esc_html__( 'Field Not Found', 'qcformbuilder-forms' ) );
    }


    /**
     * Populate fields property from an array
     *
     * @since 1.7.0
     *
     * @param Qcformbuilder_Forms_Entry_Field[] $fields  Entry field objects to add
     */
    protected function set_fields_form_array(array $fields){
        foreach ( $fields as $field ){
            $this->add_field( Qcformbuilder_Forms_Entry_Factory::entry_field($field) );
        }
    }

}