<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    remove(id) {
      this.$swal({
        title: "ต้องการลบข้อมูลนี้หรือไม่?",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          axios
            .get(`/maintenance/delete/${id}`)
            .then(function(response) {
              window.location.replace("/maintenance/index");
            })
            .catch(function(error) {
              console.log(error);
            });
        }
      });
    }
  }
};
</script>
