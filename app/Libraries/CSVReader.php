<?php

namespace App\Libraries;

class CSVReader {

	var $fields;
	/** columns names retrieved after parsing */
	var $separator = ';';
	/** separator used to explode each line */
	var $enclosure = '"';
	/** enclosure used to decorate each field */

	var $max_row_size = 4096;

	/** maximum row size to be used for decoding */

	function parse_file( $p_Filepath ) {

		//echo $this->enclosure;

		$file         = fopen( $p_Filepath, 'r' );
		$this->fields = fgetcsv( $file, $this->max_row_size, $this->separator, $this->enclosure );

		$keys_values = explode( ',', $this->fields[0] );

		$no_of_fields = count( $keys_values );
		// pa($this->fields);
		// die;


		$content = array();
		$keys    = $this->escape_string( $keys_values );

		// pa($keys);

		$i = 0;
		while ( ( $row = fgetcsv( $file, $this->max_row_size, $this->separator, $this->enclosure ) ) != false ) {
			if ( $row != null ) { // skip empty lines

				//  pa($row[0]);

				if ( strpos( $row[0], '\,' ) ) {
					$row[0] = str_replace( '\,', '#*&#^$', $row[0] );
				}

				// pa($row[0]);


				$values = explode( ',', $row[0] );
				if ( count( $keys ) == count( $values ) ) {
					$arr        = array();
					$new_values = array();
					$new_values = $this->escape_string( $values );
					for ( $j = 0; $j < count( $keys ); $j ++ ) {
						if ( $keys[ $j ] != "" ) {
							$arr[ $j ] = $new_values[ $j ];
						}
					}

					$content[ $i ] = $arr;
					$i ++;
				}

				// pa($content);

				//  echo "<hr>";
			}
		}

		//   die;
		fclose( $file );

		return $content;
	}

	function escape_string( $data ) {
		$result = array();
		foreach ( $data as $row ) {

			if ( strpos( $row, '#*&#^$' ) ) {
				$row = str_replace( '#*&#^$', ',', $row );
			}

			$result[] = str_replace( '"', '', $row );
		}

		return $result;
	}
}

?>