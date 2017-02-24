<?php
/**
 * Defines the functionality required to render the content within the Meta Box
 * to which this display belongs.
 *
 * @package           learnautoload
 */

/**
 * Defines the functionality required to render the content within the Meta Box
 * to which this display belongs.
 *
 * When the render method is called, the contents of the string it includes
 * or the file it includes to render within the meta box.
 */
class Meta_Box_Display {

	/**
	 * A reference to the object responsible for retrieving a question to display.
	 *
	 * @access private
	 * @var    Question_Reader $question_reader
	 */
	private $question_reader;

	/**
	 * Initializes the class by setting the question reader property.
	 *
	 * @param Question_Reader $question_reader The object for retrieving a question.
	 */
	public function __construct( $question_reader ) {
		$this->question_reader = $question_reader;
	}

	/**
	 * Renders a single string in the context of the meta box to which this
	 * Display belongs.
	 */
	public function render() {

		$file = dirname( __FILE__ ) . '/data/questions.txt';
		$question = $this->question_reader->get_question_from_file( $file );

		echo wp_kses( $question );
	}
}
