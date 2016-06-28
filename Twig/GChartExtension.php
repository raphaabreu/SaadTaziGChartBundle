<?php

namespace SaadTazi\GChartBundle\Twig;

use SaadTazi\GChartBundle\Chart;

/**
 * Defines GChart Twig functions
 */
class GChartExtension extends \Twig_Extension {
    
    protected $environment;

    /**
     * @param array $resources a list of resources (see Resources/g_chart.xml)
     */
    public function __construct(array $resources = array()) {
        $this->resources = $resources;
    }

    /**
     * Defines the Twig functions exposed by this extension
     * @return array list of Twig functions
     */
    public function getFunctions() {
        return array(
            'gchart_area_chart'          => new \Twig_SimpleFunction($this, 'gchartAreaChart', array('is_safe' => array('html'))),
            'gchart_bar_chart'           => new \Twig_SimpleFunction($this, 'gchartBarChart', array('is_safe' => array('html'))),
            'gchart_bubble_chart'        => new \Twig_SimpleFunction($this, 'gchartBubbleChart', array('is_safe' => array('html'))),
            'gchart_calendar'            => new \Twig_SimpleFunction($this, 'gchartCalendar', array('is_safe' => array('html'))),
            'gchart_candlestick_chart'   => new \Twig_SimpleFunction($this, 'gchartCandleStickChart', array('is_safe' => array('html'))),
            'gchart_column_chart'        => new \Twig_SimpleFunction($this, 'gchartColumnChart', array('is_safe' => array('html'))),
            'gchart_combo_chart'         => new \Twig_SimpleFunction($this, 'gchartComboChart', array('is_safe' => array('html'))),
            'gchart_donut_chart'         => new \Twig_SimpleFunction($this, 'gchartDonutChart', array('is_safe' => array('html'))),
            'gchart_gantt'               => new \Twig_SimpleFunction($this, 'gchartGantt', array('is_safe' => array('html'))),
            'gchart_gauge'               => new \Twig_SimpleFunction($this, 'gchartGauge', array('is_safe' => array('html'))),
            'gchart_geo_chart'           => new \Twig_SimpleFunction($this, 'gchartGeoChart', array('is_safe' => array('html'))),
            'gchart_get_icon_pin_url'    => new \Twig_SimpleFunction($this, 'getIconPinUrl', array('is_safe' => array('html'))),
            'gchart_get_icon_url'        => new \Twig_SimpleFunction($this, 'getIconUrl', array('is_safe' => array('html'))),
            'gchart_get_letter_pin_url'  => new \Twig_SimpleFunction($this, 'getLetterPinUrl', array('is_safe' => array('html'))),
            'gchart_get_pie_chart_url'   => new \Twig_SimpleFunction($this, 'getPieChartUrl', array('is_safe' => array('html'))),
            'gchart_get_pie_chart3d_url' => new \Twig_SimpleFunction($this, 'getPieChart3DUrl', array('is_safe' => array('html'))),
            'gchart_get_qrcode_url'      => new \Twig_SimpleFunction($this, 'getQrCodeUrl'),
            'gchart_histogram'           => new \Twig_SimpleFunction($this, 'gchartHistogram', array('is_safe' => array('html'))),
            'gchart_interval'            => new \Twig_SimpleFunction($this, 'gchartInterval', array('is_safe' => array('html'))),
            'gchart_line_chart'          => new \Twig_SimpleFunction($this, 'gchartLineChart', array('is_safe' => array('html'))),
            'gchart_map'                 => new \Twig_SimpleFunction($this, 'gchartMap', array('is_safe' => array('html'))),
            'gchart_org_chart'           => new \Twig_SimpleFunction($this, 'gchartOrgChart', array('is_safe' => array('html'))),
            'gchart_pie_chart'           => new \Twig_SimpleFunction($this, 'gchartPieChart', array('is_safe' => array('html'))),
            'gchart_sankey'              => new \Twig_SimpleFunction($this, 'gchartSankey', array('is_safe' => array('html'))),
            'gchart_scatter_chart'       => new \Twig_SimpleFunction($this, 'gchartScatterChart', array('is_safe' => array('html'))),
            'gchart_stepped_area_chart'  => new \Twig_SimpleFunction($this, 'gchartSteppedAreaChart', array('is_safe' => array('html'))),
            'gchart_table'               => new \Twig_SimpleFunction($this, 'gchartTable', array('is_safe' => array('html'))),
            'gchart_timeline'            => new \Twig_SimpleFunction($this, 'gchartTimeline', array('is_safe' => array('html'))),
            'gchart_treemap'             => new \Twig_SimpleFunction($this, 'gchartTreeMap', array('is_safe' => array('html'))),
            'gchart_trendlines'          => new \Twig_SimpleFunction($this, 'gchartTrendlines', array('is_safe' => array('html'))),
            'gchart_waterfall'           => new \Twig_SimpleFunction($this, 'gchartWaterfall', array('is_safe' => array('html'))),
            'gchart_word_tree'           => new \Twig_SimpleFunction($this, 'gchartWordTree', array('is_safe' => array('html'))),
        );
    }
    
    /**
     * gchart_area_chart definition
     */
    public function gchartAreaChart($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'AreaChart', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_bar_chart definition
     */
    public function gchartBarChart($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'BarChart', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_bubble_chart definition
     */
    public function gchartBubbleChart($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'BubbleChart', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_calendar definition
     */
    public function gchartCalendar($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'Calendar', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_candlestick_chart definition - needs 5 cols
     * @see http://code.google.com/apis/chart/interactive/docs/gallery/candlestickchart.html#Data_Format
     */
    public function gchartCandleStickChart($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'CandlestickChart', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_column_chart definition
     */
    public function gchartColumnChart($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'ColumnChart', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_combo_chart definition
     */
    public function gchartComboChart($data, $id, $width, $height, $seriesType = 'line', $title = null, $config = array(), $events = array()) {
        if (isset($seriesType) && !isset($config['seriesType'])) {
            $config['seriesType'] = $seriesType;
        }
        return $this->renderGChart($data, $id, 'ComboChart', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_donut_chart definition
     */
    public function gchartDonutChart($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        if(!array_key_exists('pieHole', $config)) {
            $config['pieHole'] = 0.4; // default pieHole value that makes the pie a donut
        }
        return $this->renderGChart($data, $id, 'DonutChart', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_calendar definition
     */
    public function gchartGantt($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'Gantt', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_gauge definition
     */
    public function gchartGauge($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'Gauge', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_geo_chart definition
     */
    public function gchartGeoChart($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'GeoChart', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_histogram definition
     */
    public function gchartHistogramChart($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'Histogram', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_interval definition
     */
    public function gchartIntervalChart($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'Interval', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_line_chart definition
     */
    public function gchartLineChart($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'LineChart', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_map definition
     */
    public function gchartMap($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'Map', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_org_chart definition
     */
    public function gchartOrgChart($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'OrgChart', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_pie_chart definition
     */
    public function gchartPieChart($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'PieChart', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_sankey definition
     */
    public function gchartSankey($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'Sankey', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_column_chart definition
     * note: The x-axis column cannot be of type string
     */
    public function gchartScatterChart($data, $id, $width, $height, $title = null, $xLabel = null, $yLabel = null, $config = array(), $events = array()) {
        if (!is_null($xLabel)) {
            $hAxis = isset($config['hAxis'])? $config['hAxis']: array();
            $hAxis['title'] = $xLabel;
            $config['hAxis'] = $hAxis;
        }
        if (!is_null($yLabel)) {
            $vAxis = isset($config['vAxis'])? $config['vAxis']: array();
            $vAxis['title'] = $yLabel;
            $config['vAxis'] = $vAxis;
        }
        
        return $this->renderGChart($data, $id, 'ScatterChart', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_stepped_area_chart definition
     */
    public function gchartSteppedAreaChart($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        if (!is_null($yLabel)) {
            $vAxis = isset($config['vAxis'])? $config['vAxis']: array();
            $vAxis['title'] = $yLabel;
            $config['vAxis'] = $vAxis;
        }
        
        return $this->renderGChart($data, $id, 'SteppedAreaChart', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_table definition
     */
    public function gchartTable($data, $id, $config = null, $events = array()) {
        return $this->renderTemplate('gChartTemplate', array('chartType' => 'Table', 'data' => $data, 'id' => $id, 'config' => $config, 'events' => $events ));
    }
    
    /**
     * gchart_timeline definition
     */
    public function gchartTimeline($data, $id, $config = null, $events = array()) {
        return $this->renderGChart($data, $id, 'Timeline', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_treemap definition - needs 4 cols
     * @see http://code.google.com/apis/chart/interactive/docs/gallery/treemap.html#Data_Format
     */
    public function gchartTreeMap($data, $id, $width, $height, $title = '', $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'TreeMap', $width, $height, $title, $config, true, $events);
    }
    
    /**
     * gchart_trendlines
     * note: The x-axis column cannot be of type string
     */
    public function gchartTrendlines($data, $id, $width, $height, $title = null, $xLabel = null, $yLabel = null, $config = array(), $events = array()) {
        if (!is_null($xLabel)) {
            $hAxis = isset($config['hAxis'])? $config['hAxis']: array();
            $hAxis['title'] = $xLabel;
            $config['hAxis'] = $hAxis;
        }
        if (!is_null($yLabel)) {
            $vAxis = isset($config['vAxis'])? $config['vAxis']: array();
            $vAxis['title'] = $yLabel;
            $config['vAxis'] = $vAxis;
        }
        
        return $this->renderGChart($data, $id, 'Trendlines', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * gchart_waterfall definition
     */
    public function gchartWaterfall($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        $configs['bar'] = array('groupWidth' => '100%');
        return $this->renderGChart($data, $id, 'Waterfall', $width, $height, $title, $config, false, $events);
    }
    
    
    /**
     * gchart_word_tree definition
     */
    public function gchartWordTree($data, $id, $width, $height, $title = null, $config = array(), $events = array()) {
        return $this->renderGChart($data, $id, 'WordTree', $width, $height, $title, $config, false, $events);
    }
    
    /**
     * Generic method that returns html of gchart charts
     */
    protected function renderGChart($data, $id, $type, $width, $height, $title = null, $config = array(), $addDivWithAndHeight = false, $events = array()) {
        $config['width'] = $width;
        $config['height'] = $height;
        if (!isset($config['title']) && !is_null($title) && trim($title) != '') { $config['title'] = $title;}
        return $this->renderTemplate('gChartTemplate', array('chartType' => $type, 'data' => $data, 'id' => $id, 'config' => $config, 'events' => $events  ), $addDivWithAndHeight);
    }
    
    /**
     * generic method that generates a Twig template based on its name
     */
    protected function renderTemplate($templateName, $params, $addDivWithAndHeight = false) {
        $templ = false;
        if (isset($this->resources[$templateName])) {
            $templ = $this->environment->loadTemplate($this->resources[$templateName]);
        } else {
            throw new \Exception('mmm, template not found');
        }
        if ($addDivWithAndHeight && isset($params['config']) && isset($params['config']['width']) && isset($params['config']['height'])) {
            $params['addDivWithAndHeight'] = true;
            $params['width'] = $params['config']['width'];
            $params['height'] = $params['config']['height'];
        } else {
            $params['addDivWithAndHeight'] = false;
        }
        
        return $templ->render($params); 
    }
    
    /**
     * gchart_get_qrcode_url definition
     */
    public function getQrCodeUrl($text, $params = array(), $rawParams = array() ) {
        $chart = new Chart\QrCode();
        return $chart->getUrl($text, $params, $rawParams);
    }
    
    public function getPieChartUrl($data, $id, $width, $height, $title = null, $params = array()) {
        $chart = new Chart\PieChart();
        return $chart->getUrl($data, $width, $height, $title, $params);
    }
    
    public function getPieChart3DUrl($data, $id, $width, $height, $title = null, $params = array()) {
        $chart = new Chart\PieChart3D();
        return $chart->getUrl($data, $width, $height, $title, $params);
    }
    
    public function getIconUrl($type, $data) {
        $chart = new Chart\DynamicIcon();
        return $chart->getUrl($type, $data);
    }
    
    public function getLetterPinUrl($text, $fill_color, $text_color = '000000', $with_shadow = false, $pin_style = 'pin') {
        $type = $with_shadow? 'd_map_xpin_letter_withshadow': 'd_map_pin_xletter';
        $data = array($pin_style, $text, $fill_color, $text_color);
        return $this->getIconUrl($type, $data);
    }
    
    public function getIconPinUrl($icon_srting, $fill_color, $with_shadow = false, $pin_style = 'pin') {
        $type = $with_shadow? 'd_map_xpin_icon_withshadow': 'd_map_xpin_icon';
        $data = array($pin_style, $icon_srting, $fill_color);
        return $this->getIconUrl($type, $data);
    }
    
    /**
     * to be able to call a Twig template from the Twig extension
     * @param \Twig_Environment $environment 
     */
    public function initRuntime(\Twig_Environment $environment) {
        $this->environment = $environment;
    }
    
    /**
     * @return string
     */
    public function getName() {
        return 'g_chart';
    }

}
