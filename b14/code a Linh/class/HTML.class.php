<?php
class HTML
{

	public static function createSelectbox($arrData, $name, $keySelected = null, $class = null, $style = null)
	{
		$xhtml = "";
		$style = $style != null ? 'style="' . $style . '"' : '';
		if (!empty($arrData)) {
			$xhtml = '<select class="' . $class . '" name="' . $name . '" ' . $style . '">';
			foreach ($arrData as $key => $value) {
				if ($keySelected == $key && is_numeric($keySelected)) {
					$xhtml .= '<option value="' . $key . '" selected="true">' . $value . '</option>';
				} else {
					$xhtml .= '<option value="' . $key . '">' . $value . '</option>';
				}
			}
			$xhtml .= '</select>';
		}
		return $xhtml;
	}

	public static function createInput($type, $name, $id = '', $value = '')
	{
		$strID = $id == '' ? '' : 'id="' . $id . '"';
		$xhtml = sprintf('<input type="%s" name="%s" %s value="%s"> ', $type, $name, $strID, $value);
		return $xhtml;
	}

	public static function createFromRow($lblName, $input)
	{
		$xhtml = '
		<div class="row">
			<p>' . $lblName . '</p>
			' . $input . '
		</div>
		';

		return $xhtml;
	}
}
