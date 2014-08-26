<?php
error_reporting(E_ALL);

require_once 'mcpi/block.php';

class BlockData {
    
    /* NOTE that in this class 
        private static properties and public static functions to access them
        have been declared next to each other for easy maintenance
        The blockIdToName has to be initialised in static function if null
        as the id functions are expressions;
    */
    
    //Use final private constructor to prevent instantiation
    final private function __construct(){
        //Do nothing
    }

    //prevent duplication
    final private function __clone(){
        //Do nothing
    }
    
    
    private static $blockIdToName = NULL;
    
    public static function blockIdToName(){
       if (self::$blockIdToName === NULL){
          //var_dump(self::$blockIdToName);
           self::$blockIdToName =  array(  
                Block::AIR()->id() => 'AIR',
                Block::STONE()->id() =>'STONE',
                Block::GRASS()->id() =>'GRASS',
                Block::DIRT()->id() =>'DIRT',
                Block::COBBLESTONE()->id() =>'COBBLESTONE',
                Block::WOOD_PLANKS()->id() =>'WOOD_PLANKS',
                Block::SAPLING()->id() =>'SAPLING',
                Block::BEDROCK()->id() =>'BEDROCK',
                Block::WATER_FLOWING()->id() =>'WATER_FLOWING',
                Block::WATER_STATIONARY()->id() =>'WATER_STATIONARY',
                Block::LAVA_FLOWING()->id() =>'LAVA_FLOWING',
                Block::LAVA_STATIONARY()->id() =>'LAVA_STATIONARY',
                Block::SAND()->id() =>'SAND',
                Block::GRAVEL()->id() =>'GRAVEL',
                Block::GOLD_ORE()->id() =>'GOLD_ORE',
                Block::IRON_ORE()->id() =>'IRON_ORE',
                Block::COAL_ORE()->id() =>'COAL_ORE',
                Block::WOOD()->id() =>'WOOD',
                Block::LEAVES()->id() =>'LEAVES',
                Block::GLASS()->id() =>'GLASS',
                Block::LAPIS_LAZULI_ORE()->id() =>'LAPIS_LAZULI_ORE',
                Block::LAPIS_LAZULI_BLOCK()->id() =>'LAPIS_LAZULI_BLOCK',
                Block::SANDSTONE()->id() =>'SANDSTONE',
                Block::BED()->id() =>'BED',
                Block::COBWEB()->id() =>'COBWEB',
                Block::GRASS_TALL()->id() =>'GRASS_TALL',
                Block::WOOL()->id() =>'WOOL',
                Block::FLOWER_YELLOW()->id() =>'FLOWER_YELLOW',
                Block::FLOWER_CYAN()->id() =>'FLOWER_CYAN',
                Block::MUSHROOM_BROWN()->id() =>'MUSHROOM_BROWN',
                Block::MUSHROOM_RED()->id() =>'MUSHROOM_RED',
                Block::GOLD_BLOCK()->id() =>'GOLD_BLOCK',
                Block::IRON_BLOCK()->id() =>'IRON_BLOCK',
                Block::STONE_SLAB_DOUBLE()->id() =>'STONE_SLAB_DOUBLE',
                Block::STONE_SLAB()->id() =>'STONE_SLAB',
                Block::BRICK_BLOCK()->id() =>'BRICK_BLOCK',
                Block::TNT()->id() =>'TNT',
                Block::BOOKSHELF()->id() =>'BOOKSHELF',
                Block::MOSS_STONE()->id() =>'MOSS_STONE',
                Block::OBSIDIAN()->id() =>'OBSIDIAN',
                Block::TORCH()->id() =>'TORCH',
                Block::FIRE()->id() =>'FIRE',
                Block::STAIRS_WOOD()->id() =>'STAIRS_WOOD',
                Block::CHEST()->id() =>'CHEST',
                Block::DIAMOND_ORE()->id() =>'DIAMOND_ORE',
                Block::DIAMOND_BLOCK()->id() =>'DIAMOND_BLOCK',
                Block::CRAFTING_TABLE()->id() =>'CRAFTING_TABLE',
                Block::FARMLAND()->id() =>'FARMLAND',
                Block::FURNACE_INACTIVE()->id() =>'FURNACE_INACTIVE',
                Block::FURNACE_ACTIVE()->id() =>'FURNACE_ACTIVE',
                Block::DOOR_WOOD()->id() =>'DOOR_WOOD',
                Block::LADDER()->id() =>'LADDER',
                Block::STAIRS_COBBLESTONE()->id() =>'STAIRS_COBBLESTONE',
                Block::DOOR_IRON()->id() =>'DOOR_IRON',
                Block::REDSTONE_ORE()->id() =>'REDSTONE_ORE',
                Block::SNOW()->id() =>'SNOW',
                Block::ICE()->id() =>'ICE',
                Block::SNOW_BLOCK()->id() =>'SNOW_BLOCK',
                Block::CACTUS()->id() =>'CACTUS',
                Block::CLAY()->id() =>'CLAY',
                Block::SUGAR_CANE()->id() =>'SUGAR_CANE',
                Block::FENCE()->id() =>'FENCE',
                Block::GLOWSTONE_BLOCK()->id() =>'GLOWSTONE_BLOCK',
                Block::BEDROCK_INVISIBLE()->id() =>'BEDROCK_INVISIBLE',
                Block::STONE_BRICK()->id() =>'STONE_BRICK',
                Block::GLASS_PANE()->id() =>'GLASS_PANE',
                Block::MELON()->id() =>'MELON',
                Block::FENCE_GATE()->id() =>'FENCE_GATE',
                Block::GLOWING_OBSIDIAN()->id() =>'GLOWING_OBSIDIAN',
                Block::NETHER_REACTOR_CORE()->id() =>'NETHER_REACTOR_CORE'
            );
        }
        return self::$blockIdToName;
    }

    public static function getBlockNameFromId($id){
        return BlockData::blockIdToName()[$id];
    }

    //avaiable 0-1, affects whether striking blk sets off fuse
    private static $tntTypeNameToId = array(
        'safe'  => 0,
        'armed' => 1
    );
    
    public static function tntTypeNameToId(){
        return BlockData::$tntTypeNameToId;
    }


    //available range 0-15, affects colour of wool block
    private static $colourNameToId  = array(
        'white'      => 0,
        'orange'     => 1,
        'magenta'    => 2,
        'light-blue' => 3,
        'yellow'     => 4,
        'lime'       => 5,
        'pink'       => 6,
        'grey'       => 7,
        'gray'       => 7,
        'light-grey' => 8,
        'light-gray' => 8,
        'cyan'       => 9,
        'purple'     =>10,
        'blue'       =>11,
        'brown'      =>12,
        'green'      =>13,
        'red'        =>14,
        'black'      =>15
        );
    public static function colourNameToId(){
        return BlockData::$colourNameToId;
    }


    // only 0-2 seem to do anything for texture
    // 0 to 3 is type, beyond that is decay counter
    // avilablerange 0-15 
    private static $leavesTypeNameToId = array(
        'oak'   => 0,
        'pine'  => 1,
        'spruce'=> 1,
        'birch' => 2,
        'jungle'=> 3
    );
    public static function leavesTypeNameToId(){
        return BlockData::$leavesTypeNameToId;
    }


    // only 0-2 seem to o anything
    // available values 0-15 affects texture and rotation
    private static $woodPlanksTypeNameToId = array(
        'oak-up'       => 0,
        'spruce-up'    => 1,
        'birch-up'     => 2,
        'jungle-up'    => 3,
        'oak-east'     => 4,
        'spruce-east'  => 5,
        'birch-east'   => 6,
        'jungle-east'  => 7,
        'oak-north'    => 8,
        'spruce-north' => 9,
        'birch-north'  =>10,
        'jungle-north' =>11,
        'oak-bark'     =>12,
        'spruce-bark'  =>13,
        'birch-bark'   =>14,
        'jungle-bark'  =>15
    );
    public static function woodPlanksTypeNameToId(){
        return BlockData::$woodPlanksTypeNameToId;
    }


    // available 0-15
    // 6,7,14 and 15 don't work (uses default stone)
    private static $slabTypeNameToId = array(
        'stone'            => 0,
        'sandstone'        => 1,
        'wooden'           => 2,
        'cobblestone'      => 3,
        'brick'            => 4,
        'stone-brick'      => 5,
    //just is stone
        'nether-brick'     => 6,
    //just is stone
        'quartz'           => 7,
        'stone-top'        => 8,
        'sandstone-top'    => 9,
        'wooden-top'       =>10,
        'cobblestone-top'  =>11,
        'brick'            =>12,
        'stone-brick'      =>13,
    //just is stone
        'nether-brick-top' =>14,
    //just is stone
        'quartz-top'       =>15
    );
    public static function slabTypeNameToId(){
        return BlockData::$slabTypeNameToId;
    }


    //available 0-15
    // only 1 to 5 does anything
    // 6 and 7 wil use default stone
    // above that just cycles back round 
    private static $doubleSlabTypeNameToId = array(
        'stone'            => 0,
        'sandstone'        => 1,
        'wooden'           => 2,
        'cobblestone'      => 3,
        'brick'            => 4,
        'stone-brick'      => 5,
    //just is stone
        'nether-brick'     => 6,
    //just is stone
        'quartz'           => 7
        );
    public static function doubleSlabTypeNameToId(){
        return BlockData::$doubleSlabTypeNameToId;
    }


    //available 0 to 2
    private static $sandstoneTypeNameToId = array(
        'sandstone' => 0,
        'chiseled'  => 1,
        'smooth'    => 2
    );
    public static function sandstoneTypeNameToId(){
        return BlockData::$sandstoneTypeNameToId;
    }


    // available 0 to 3
    private static $bedTypeNameToId = array(
        'south' => 0,
        'west'  => 1,
        'north' => 2,
        'east'  => 3
    );
    public static function bedTypeNameToId(){
        return BlockData::$bedTypeNameToId;
    }


    // available 0 to 3
    // no effect seemingly
    private static $grassTypeNameToId = array(
        'shub'        => 0,
        'grass'       => 1,
        'fern'        => 2,
        'biome-shrub' => 3
    );
    public static function grassTypeNameToId(){
        return BlockData::$grassTypeNameToId;
    }


    // there appears to be no difference for each value
    private static $yellowFlowerTypeNameToId = array(
        'yellow' => 0
    );
    public static function yellowFlowerTypeNameToId(){
        return BlockData::$yellowFlowerTypeNameToId;
    }


    // there appears to be no difference for each value
    private static $blueFlowerTypeNameToId = array(
        'blue' => 0
    );
    public static function blueFlowerTypeNameToId(){
        return BlockData::$blueFlowerTypeNameToId;
    }


    // direction of ascending 0 to 7 available
    // 0 to 3 for normal stairs, 4-7 for inverted stairs
    private static $stairsTypeNameToId = array(
        'east' => 0,
        'west' => 1,
        'south'=> 2,
        'north'=> 3,
        'east-inverted' => 4,
        'west-inverted' => 5,
        'south-inverted'=> 6,
        'north-inverted'=> 7
    );

    public static function stairsTypeNameToId(){
        return BlockData::$stairsTypeNameToId;
    }

    private static $doorTypeNameToId = array(
        'northwest'=> 0,
        'northeast'=> 1,
        'southeast'=> 2,
        'southwest'=> 3,
        'northwest-swung'=> 0,
        'northeast-swung'=> 1,
        'southeast-swung'=> 2,
        'southwest-swung'=> 3,
        'northwest-top'=> 8,
        'northeast-top'=> 9,
        'southeast-top'=>10,
        'southwest-top'=>11,
        'northwest-top-swung'=>12,
        'northeast-top-swung'=>13,
        'southeast-top-swung'=>14,
        'southwest-top-swung'=>15
    );

    public static function doorTypeNameToId(){
        return BlockData::$doorTypeNameToId;
    }
}


echo "id is ".        Block::AIR()->id()."\n";
echo BlockData::blockIdToName()[0]."\n";
print BlockData::blockIdToName()[1]."\n";

?>
