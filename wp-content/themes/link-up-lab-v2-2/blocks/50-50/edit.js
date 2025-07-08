import ACFBlock from '../../assets/js/utils/blocks';

/**
 * Custom 5050Editor Block, describe your block here.
 */
class ffEditor {
    /**
     * Constructor method
     *
     * @param {HTMLElement} block
     */
    constructor( block ) {
        // This Js file only runs in the editor view.
    }

    /**
     * The name of your block, don't modify this static method!!
     *
     * @return {string} The name of your block
     */
    static getName() {
        return '50-50';
    }

    // Your methods
}

new ACFBlock( ffEditor );