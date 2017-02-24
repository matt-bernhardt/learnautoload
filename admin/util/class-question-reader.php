<?php
/**
 * Reads the contents of a specified file and returns a random line from the
 * file.
 *
 * @package           learnautoload
 */

/**
 * Reads the contents of a specified file and returns a random line from the
 * file.
 *
 * This class is used to populate the contents of the meta box with questions
 * that prompt the user for ideas about which to write.
 *
 * Note this class is only for demo purposes. It has no error handling and
 * assumes the specified file always exists.
 */
class Question_Reader {

	/**
	 * Retrieves a question from the specified file.
	 *
	 * @param  string $filename  The path to the file that contains the question.
	 * @return string $question A single question from the specified file.
	 */
	public function get_question_from_file( $filename ) {

		$question = '';

		$file_handle = $this->open( $filename );
		$question    = $this->get_random_question( $file_handle, $filename );

		$this->close( $file_handle );

		return $question;
	}

	/**
	 * Opens the file for reading and returns the resource to the file.
	 *
	 * @access private
	 * @param  string $filename  The path to the file that contains the question.
	 * @return resource          A resource to the file.
	 */
	private function open( $filename ) {
		return fopen( $filename, 'r' );
	}

	/**
	 * Closes the file that was read.
	 *
	 * @access private
	 * @param  string $file_handle The resource to the file that was read.
	 */
	private function close( $file_handle ) {
		fclose( $file_handle );
	}

	/**
	 * Opens the file for reading and returns the resource to the file.
	 *
	 * @access private
	 * @param  string $file_handle The resource to the file that was read.
	 * @param  string $filename    The path to the file containing the question.
	 * @return string $question    The question to display in the meta box.
	 */
	private function get_random_question( $file_handle, $filename ) {

		$questions = fread( $file_handle, filesize( $filename ) );
		$questions = explode( "\n", $questions );

		// Look for a question until an empty string is no longer returned.
		$question = $questions[ rand( 0, 75 ) ];
		while ( empty( $question ) ) {
			$question = $questions[ rand( 0, 75 ) ];
		}

		return $question;
	}
}
