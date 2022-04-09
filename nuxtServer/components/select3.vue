<template>
  <select style="width: 100%" :name="name" data-placeholder="dfff">
    <slot></slot>
  </select>
</template>


<script>
      export default {
  props: ['options', 'value', 'name', 'placeholder'],
  mounted: function () {
    var vm = this
    var data = [];
    this.options.forEach(function(option) {
      data.push({
        id: option.id,
        text: option.text
      });
    });
    $(this.$el)
      // init select2
      .select2({ data: data ,  minimumResultsForSearch: 1 })
      // emit event on change.
      .on('change', function () {
        vm.$emit('input', this.value)
      });
    if (this.value) {
      $(this.$el).val(this.value).trigger('change');
    }
  },
  watch: {
    value: function (value) {
      $(this.$el).val(value)
    },
    options: function (options) {
      // update options
      $(this.$el).select2({ data: options })
    }
  },
  destroyed: function () {
    $(this.$el).off().select2('destroy')
  }
}
</script>


