<?php

function auto_load($class, $directory = 'classes')
{	
	$file = str_replace('_', DIRECTORY_SEPARATOR, $class).'.php';
	$path = $directory.DIRECTORY_SEPARATOR.$file;
	require $path;
}

spl_autoload_register('auto_load');


$items = array(
	array(
		'name'=>'Google', 
		'url'=>'http://google.com',
		'image'=>'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAA6lBMVEX////qQzU0qFNChfT7vAVXkPU0f/QmpUoPoT77twAspk71t7TpOinqQTPpLBfoJw7/+e70ralGh/TynpnpMh8pevPsYliVu+Ps9e41oz3e7uLM5dEseflglfU7qlhzvYR1ofYMplfm7f39xkhxrUdWs2+Rs/j06chOsGasxfnc5vy22r2ZzaWFxJPT6dg5npCm07A9lL1Dgv7B4MfE1fucuvg1pWYyguj74N798fDrT0btamH94rnsThX7wzTweCj519Xxko34ysfpNTf803z/36HVth38wwD1mBz5rwDubFaosjb+8dvN2/sqSD1wAAABcklEQVRIie3R2VLCMBQG4DSUJo1JS1mqgLJpFcUFdzYRRMT1/V/HNLRIaVM644zjBf9dMt85OacFYJN/klGuz0yT2uOnBNhSDMqYojBG8/ncus5KnlM/vCL2BctcwqLAHMv12PAVY16dacl7e5oa1LYZX4HrLanumPPORq7jHrsWpTEa9MT71O4ubvoxevAwcXVfLgIZzh4nCusl1Bldnb1OjFFCPtVVdfb2nlCDZ9XN1D+ml5NthPi+q/VP/5hNLaXwFeJDwTORXLv5LY8bJoKLVfXFqiltnjk/CfEB/5DqS3P1Oi1WDX8Z/pvUjzoqB28bBdE+pPnw+kEdQhK8rIlZDiP4URHykMA4x6J5ITw6j0OEr5QWN9u7YpS9KA12MBTBVbFAqQ3x5ZW0OQDXnicII4QxgrB4oaW022gNQNvzP0F39zWZdvuTFY+rcs3ndwIFCLfiNE/Z4YPzEkIQQqdrsHihdeY0K061fZ4Ab/In+QZVTB0vJXBBuAAAAABJRU5ErkJggg=='
	),
	array(
		'name'=>'Facebook', 
		'url'=>'http://facebook.com',
		'image'=>'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE8AAABPCAMAAACd6mi0AAAAZlBMVEU9VJ7////e4e0pRZg4UJzj5vHn6vNre7M1Tpvt7/U6Up1abq1mebP19vrHzeGMmMNIXqTV2ulidK9bb60wTJxTZ6jO1Oa/xt20u9aFksBCWaFMY6chQJXs7vYAMpCmr86TnsVzhLlD0QPBAAABtElEQVRYhe3Za2+CMBQG4LYUeqNIuU0Fh/7/PzmqAzutgXZNlri+Cd/gSQOcUz0ACKFkKESYnCwAYUGaJEQaUmivKCkHIcJpWUAgCQ2i6VAiAWvCrE6HNwygJBgHQIKi90cexxzT6eAc3F8QT2+Sml5UlwupRFsCvoB+HqXVuVAozU5ZipBSezGDHh7Hw0Xpyr8HVdjb45wo+BBV+3vHHXvkoBLeHj7LJw52re/9o7mF+4WHTxbO36OjjYNF7+fxPrV7pZ9Hd7a7p735DDev2f90mOo6NWU8enm87AxMjlPd3YL96pcLszLGhD9vPG5ehQyvtG1jTh4m5uMdbKf4eyfrZf5eFr338fA1NDe9AS9x3S/LuhY6h8x4/3oxpxZHp35FDxm7xWwuJ7akc9vfXrW9JY79ftX7cOunq94eh13f2ARdnzwv/xCCeOwwP94wXkrCeqh1q481Ty3bZRivWx7vxvrt82uqnVG/TORzWuff49/9hdj7i7Fxvkk/jV70ohe96EXvv3vb57vrnp7vbp8/r3t6/rx9Pr7m3ebj2+f3Q2V6n6/m99u/L6RMLrFccv2+8AVTQh915QFvDwAAAABJRU5ErkJggg=='
	),
	array(
		'name'=>'GitHub', 
		'url'=>'http://github.com',
		'image'=>'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAYFBMVEX///8XFRXw8PAhICD4+Pj7+/vn5+eioqJjY2PR0dEgHh7u7u49PT1fXl46OTnOzs41NDQmJSV7e3utq6tubm5zc3MbGhqVlJSKiopKSkpWVlbBwcHZ2dloZmYuLi6TkpJHI1OrAAABPklEQVQ4jXVS2baDIAwMuIALitWqaGv//y8vJOgR8OZBkJkhyRCAKxrxbWvG6vYrGkijkuwWsopgPrEoJh7IdYwzpm+X7FmKM5btJ94/4pbR+/yH/elUwMpUZ78H1YH1jZCLwbZojG11EDmMWCkmQImriH/oyo8TVnjskqhrFwTpFEBJSceYMNJ5CQLXIzG3ORAQIP2aBCkldLjylMAR6GDGDCkOgDlmIN+fCPQ+RKifCDURat9NEqWXts82nEa09BKsLWK8IOV0OvaKCa/TYT7TTgZllH5CZ2vQ28p3Y/dS9Jio6IXyKvZ2ZPuz5Ma/nQt1zc2M167utUvnmx/C/SKsVK9Vb8DFuvtWmhM3/qC0pi63CrnH9VW3Y5if+OUBQd/6arb7oxNhC2fIjnRAGJIR4osefIp80MvDBP0Tf+zPC+5F2aFWAAAAAElFTkSuQmCC'
	)
);

class Menu extends Tag_Block
{
	private $items;
	
	protected $header = 'Menu normalne (tekstowe)';

	public function __construct($items)
	{
		parent::__construct();
	
		$this->items = $items;
	}

	protected function _render()
	{
		$this->add(new Tag_Header($this->header,1));
	
		if (count($this->items) == 0) {
			$this->add(new Tag_Paragraph('No items'));
		} else {
			$list = new Tag_List();
			$this->add($list);
			
			foreach ($this->items as $item) {
				$link = $this->_getLink($item);
				$list->add($link);
			}
		}
		
		return parent::_render();
	}
	
	protected function _getLink($item)
	{
		return new Tag_HyperLink($item['name'], $item['url']);
	}
}

class MenuImages extends Menu
{
	protected $header = 'Menu z ikonkami';

	protected function _getLink($item)
	{	
		$image = new Tag_Img($item['image']);
		$image->set('alt', $item['name']);
		
		$link = new Tag_HyperLink($item['name'], $item['url']);
		$link->add($image);

		return $link;
	}
}

$menu = new Menu($items);
$menuImages = new MenuImages($items);

echo $menu->render();
echo $menuImages->render();
