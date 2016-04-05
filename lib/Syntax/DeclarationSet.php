<?php

/**
 * class NielsHoppe\PHPCSS\Syntax\DeclarationSet
 */

namespace NielsHoppe\PHPCSS\Syntax;

/**
 * DeclarationSet
 * This is a utility without an explicit counterpart from the specification
 */

class DeclarationSet extends DeclarationList {

    /**
     * Construct a DeclarationSet from an array of Declarations
     *
     * @param Declaration[] $declarations
     */

    public function __construct ($declarations = array()) {

        $this->declarations = array();

        foreach ($declarations as $declaration) {

            $this->addDeclaration($declaration);
        }
    }

    /**
     * Adds a Declaration to this DeclarationSet
     *
     * @param Declaration $declaration
     */

    public function addDeclaration (Declaration $declaration) {

        $property = $declaration->getProperty();

        $this->declarations[$property] = $declaration;
    }

    /**
     * Shorthand for creating and adding a declaration to this DeclarationSet
     *
     * @param string $property
     * @param string $value
     * @param bool $important
     */

    public function createDeclaration ($property, $value, $important = false) {

        $this->addDeclaration(new Declaration($property, $value, $important));
    }

    /**
     * Get the declarations in this set
     *
     * @param string[] $filter
     * @return Declaration[]
     */

    public function getDeclarations ($filter = array()) {

        if (count($filter)) {

            $result = array();

            foreach ($this->declarations as $property => $declaration) {

                if (in_array($property, $filter)) {

                    array_push($result, $declaration);
                }
            }

            return $result;
        }

        return array_values($this->declarations);
    }

    /**
     * Return string representation
     *
     * @return string
     */

    public function __toString () {

        return implode('; ', array_map('strval', array_values($this->declarations)));
    }
}
